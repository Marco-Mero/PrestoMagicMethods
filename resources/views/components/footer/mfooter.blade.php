<footer class="site-footer my-3">
    <div class="container d-flex justify-content-around">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div>
                    <h2 class="title-foot">About</h2>
                    <p>
                        {{ $footerMsg }}
                        Siamo un gruppo di programmatori frontend e backend appassionati e altamente qualificati,
                        specializzati nello sviluppo di applicazioni web di alta qualità. Ci impegniamo a creare
                        soluzioni
                        digitali su misura per soddisfare le esigenze uniche dei nostri clienti. Grazie alla nostra
                        vasta
                        esperienza e al nostro continuo impegno nell'apprendimento delle ultime tecnologie, siamo in
                        grado
                        di offrire un servizio professionale e innovativo.</p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <h4 class=" footer_title title-foot">Categories</h4>
                <ul class="footer-links">

                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-6 col-lg-3">
                <li class="footer_item">
                    <h4 class=" footer_title title-foot">MagicMethods</h4>

                    <ul class="nav__ul">
                        <li>
                            <a href="https://www.linkedin.com/in/leonardo-pericoli-fullstack/">Leonardo Pericoli</a>
                        </li>

                        <li>
                            <a href="https://www.linkedin.com/in/marco-mero-fullstack/">Marco Mero</a>
                        </li>

                        <li>
                            <a href="https://www.linkedin.com/in/emanuele-minghella-web-developer/">Emanuele
                                Mighella</a>
                        </li>

                        <li>
                            <a href="https://www.linkedin.com/in/piero-ferrulli-web-developer/">Piero Ferrulli</a>
                        </li>

                        <li>
                            <a href="https://www.linkedin.com/mwlite/in/bianca-modina-622620236">Bianca Modina</a>
                        </li>

                        <li>
                            <a href="https://www.linkedin.com/in/michele-bartucci-web-developer/">Michele Bartucci</a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <p class="title-foot">© 2023 MagicMethods. All rights reserved.</p>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
                <ul class="social-icons d-flex justify-content-end">
                    <li><a class="facebook" href="https://www.facebook.com/aulab"><i
                                class="fa-brands fa-facebook"></i></a></li>
                    <li><a class="twitter" href="https://twitter.com/auLAB_it"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <li><a class="dribbble" href="https://www.instagram.com/aulab_it/"><i
                                class="fa-brands fa-instagram"></i></a></li>
                    <li><a class="linkedin" href="https://www.linkedin.com/school/aulab-srl/"><i
                                class="fa-brands fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
