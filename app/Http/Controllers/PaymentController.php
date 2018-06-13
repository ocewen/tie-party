<?php
namespace App\Http\Controllers;

use DB;
use URL;
use Session;
use App\User;
use Redirect;
use Validator;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use App\Http\Requests;

//-------------------------
//All Paypal Details class
//-------------------------
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use PayPal\Auth\OAuthTokenCredential;

class PaymentController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        //------------------------   
        //setup PayPal api context
        //------------------------
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function addPayment()
    {
        return view('addPayment');
    }

    public function postPaymentWithpaypal()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName('Tie Premium - Licencia Premium')
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setPrice(49.99);
            //->setPrice($request->get('amount')); //unit price

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal(49.99);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Suscripción a Tie Party<small>&copy;</small> - Premium');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) //Specify return URL
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try 
        {
            $payment->create($this->_api_context);
        } 
        catch (\PayPal\Exception\PPConnectionException $ex) 
        {
            if (\Config::get('app.debug')) 
            {
                \Session::put('error','Connection timeout');
                return Redirect::route('paywithpaypal');
            } 
            else 
            {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }

        foreach($payment->getLinks() as $link) 
        {
            if($link->getRel() == 'approval_url') 
            {
                $redirect_url = $link->getHref();
                break;
            }
        }

        //--------------------------
        // add payment ID to session
        //--------------------------
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) 
        {
            //-------------------
            // redirect to paypal
            //-------------------
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
    	return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus()
    {
        //----------------------------------------
        // Get the payment ID before session clear
        //----------------------------------------
        $payment_id = Session::get('paypal_payment_id');

        //-----------------------------
        // clear the session payment ID
        //-----------------------------
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) 
        {
            \Session::put('error','Pago fallido');
            return Redirect::route('addPayment');
        }
        $payment = Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //---Execute the payment ---//
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') { 
            
            //Cambiar el estado del usuario a premium
            $user = new User();
            $user->activarPremium(Auth::user()->id);

            \Session::put('success','Pago aprobado');
            return redirect('/fiesta/user')->with('status', '¡Enhorabuena, tu estado de Tie-Party Premium ha sido activado!');
        }
        \Session::put('status','Pago fallido');

		return Redirect::route('/fiesta/user');
    }
}