@include('layouts.headerTie')
        <section id="pant3" class="quienes-section">
            <div class="row">
                <h2 class="home-h2">Quienes somos</h2>
                <div class="home-boxs-3">
                    <div class="h-box-3">
                        <div class="h-box-3-img img-box">
                            <img src="{{URL::asset('/images/public_images/cercana.jpg')}}" alt="foto fiesta">
                        </div>
                        <div class="h-box-3-text">
                            <h3>Una empresa cercana</h3>
                            <p>Somo una empresa con cede en Granada, Málaga, que fue fundada en 2018 debido a la necesidad de realizar el trabajo final de nuestra formación, y, quién sabe, con aspiraciones a más.</p>
                        </div>
                        <div class="adorno adorno-fuegos-2 adorno-fuegos-2-1"></div>
                    </div>
                    <div class="h-box-3">
                        <div class="h-box-3-img img-box">
                            <img src="{{URL::asset('/images/public_images/metas.jpg')}}" alt="foto boda">
                        </div>
                        <div class="h-box-3-text">
                            <h3>Una meta</h3>
                            <p>Nuestro objetivo es acerca a los usuarios que desean organizar y participar de una fiesta, a aquellos empresarios que prestan servicios para dichos fines. En ocasiones, el usuario normal desconoce el potencial que tiene una simple fiesta en el hogar.</p>
                        </div>
                        <!-- <div class="adorno adorno-fuegos-1"></div> -->
                    </div>
                    <div class="h-box-3">
                        <div class="h-box-3-img img-box">
                            <img src="{{URL::asset('/images/public_images/suenos.jpg')}}" alt="foto celebracion">
                        </div>
                        <div class="h-box-3-text">
                            <h3>Unos soñadores</h3>
                            <p>Esta empresa fue fundada por Don Antonio Aguayo Torres y Don Guillermo Barbosa Blois, que pusieron en este proyecto todo su conocimiento, esfuerzo e ilusión para alcanzar hasta la última de sus metas.</p>
                        </div>
                        <div class="adorno adorno-fuegos-1"></div>
                    </div>
                </div>
            </div>
        </section>
@include('layouts/footer1')