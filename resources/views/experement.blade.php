<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body>

    <div class="header-top position-sticky top-0 shadow mb-5">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none align-items-center">
                        <span class="logo">
                            94
                        </span>
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-3 link-secondary">Популярное</a></li>
                    <li><a href="#" class="nav-link px-3">Свежее</a></li>
                    <li><a href="#" class="nav-link px-3">Моя лента</a></li>
                    <li><a href="#" class="nav-link px-3">Закладки</a></li>
                </ul>

                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-primary">Войти</button>
                </div>
            </header>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="bg-white p-5 rounded">
                <div class="col-xxl-8 mx-auto">

                    <div class="post">

                        <a class="text-decoration-none" href="#">
                            FEATURED POST
                        </a>
                        <h1>Apple honors eight
                            developers with annual Apple Design Awards</h1>

                        <p class="has-medium-font-size">Winners are recognized for outstanding app design,
                            innovation, ingenuity, and technical achievement</p>
                        <figure>
                            <img src="https://themegenix.net/html/sarsa-html/assets/img/interior/interior_01.jpg"
                                alt="Post Images">
                            <figcaption>The Apple Design Award trophy, created by the Apple Design team, is a symbol
                                of achievement and excellence.</figcaption>
                        </figure>
                        <p>Apple today named eight app and game developers receiving an Apple Design Award, each one
                            selected for being thoughtful and creative. Apple Design Award winners bring distinctive
                            new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up
                            from developers large and small, in every part of the world, and provide users with new
                            ways of working, creating, and playing.</p>
                        <p>“Every year, app and game developers demonstrate exceptional craftsmanship and we’re
                            honoring the best of the best,” said Ron Okamoto, Apple’s vice president of Worldwide
                            Developer Relations. “Receiving an Apple Design Award is a special and laudable
                            accomplishment. Past honorees have made some of the most noteworthy apps and games of
                            all time. Through their vision, determination, and exacting standards, the winning
                            developers inspire not only their peers in the Apple developer community, but all of us
                            at Apple, too.”</p>
                        <h2>Apple Design Award Winners: Apps</h2>
                        <p> Apple today named eight app and game developers receiving an Apple Design Award, each
                            one selected for being thoughtful and creative. Apple Design Award winners bring
                            distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps
                            spring up from developers large and small, in every part of the world, and provide users
                            with new ways of working, creating, and playing.</p>
                        <p>“Every year, app and game developers demonstrate exceptional craftsmanship and we’re
                            honoring the best of the best,” said Ron Okamoto, Apple’s vice president of Worldwide
                            Developer Relations. “Receiving an Apple Design Award is a special and laudable
                            accomplishment. Past honorees have made some of the most noteworthy apps and games of
                            all time. Through their vision, determination, and exacting standards, the winning
                            developers inspire not only their peers in the Apple developer community, but all of us
                            at Apple, too.”</p>
                        <blockquote>
                            <p>“Most of us felt like we could trust each other to be quarantined together, so we
                                didn’t need to wear masks or stay far apart.”</p>
                        </blockquote>
                        <figure>
                            <img src="assets/images/post-single/post-single-03.jpg" alt="Post Images">
                            <figcaption>The Apple Design Award trophy, created by the Apple Design team, is a symbol
                                of achievement and excellence.</figcaption>
                        </figure>
                        <h2>Apple Design Award Winners: Apps</h2>
                        <p><a href="#">Apple today named</a> eight app and game developers receiving an Apple
                            Design
                            Award, each one selected for being thoughtful and creative. Apple Design Award winners
                            bring distinctive new ideas to life and demonstrate deep mastery of Apple technology.
                            The apps spring up from developers large and small, in every part of the world, and
                            provide users with new ways of working, creating, and playing.</p>
                        <p>“Every year, app and game developers demonstrate exceptional craftsmanship and we’re
                            honoring the best of the best,” said Ron Okamoto, Apple’s vice president of Worldwide
                            Developer Relations. “Receiving an Apple Design Award is a special and laudable
                            accomplishment. Past honorees have made some of the most noteworthy apps and games of
                            all time. Through their vision, determination, and exacting standards, the winning
                            developers inspire not only their peers in the Apple developer community, but all of us
                            at Apple, too.”</p>
                        <figure>
                            <img src="assets/images/post-single/post-single-04.jpg" alt="Post Images">
                            <figcaption>The Apple Design Award trophy, created by the Apple Design team, is a symbol
                                of achievement and excellence.</figcaption>
                        </figure>
                        <h3>Apple Design Award Winners: Apps </h3>
                        <p> <a href="#">Apple today named</a> eight app and game developers receiving an Apple
                            Design Award, each one selected for being thoughtful and creative. Apple Design Award
                            winners bring distinctive new ideas to life and demonstrate deep mastery of Apple
                            technology. The apps spring up from developers large and small, in every part of the
                            world, and provide users with new ways of working, creating, and playing.</p>
                        <p>“Every year, app and game developers demonstrate exceptional craftsmanship and we’re
                            honoring the best of the best,” said Ron Okamoto, Apple’s vice president of Worldwide
                            Developer Relations. “Receiving an Apple Design Award is a special and laudable
                            accomplishment. Past honorees have made some of the most noteworthy apps and games of
                            all time. Through their vision, determination, and exacting standards, the winning
                            developers inspire not only their peers in the Apple developer community, but all of us
                            at Apple, too.”</p>
                        <p>More than 250 developers have been recognized with Apple Design Awards
                            over the past 20 years. The recognition has proven to be an accelerant for developers
                            who are pioneering innovative designs within their individual apps and influencing
                            entire categories. Previous winners such as Pixelmator, djay, Complete Anatomy,
                            HomeCourt, “Florence,” and “Crossy Road” have set the standard in areas such as
                            storytelling, interface design, and use of Apple tools and technologies.</p>
                        <p>For more information on the apps and games, visit the <a href="#">App Store</a>.</p>

                        <div class="tagcloud">
                            <a href="#">Design</a>
                            <a href="#">Life Style</a>
                            <a href="#">Web Design</a>
                            <a href="#">Development</a>
                            <a href="#">Design</a>
                            <a href="#">Life Style</a>
                        </div>

                        <div class="social-share-block">
                            <div class="post-like">
                                <a href="#"><i class="fal fa-thumbs-up"></i><span>2.2k Like</span></a>
                            </div>
                            <ul class="social-icon icon-rounded-transparent md-size">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>

                        <!-- Start Author  -->
                        <div class="about-author">
                            <div class="media">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="assets/images/post-images/author/author-b1.png" alt="Author Images">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="author-info">
                                        <h5 class="title">
                                            <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
                                                    <span data-text="Rahabi Ahmed Khan">Rahabi Ahmed Khan</span>
                                                </span>
                                            </a>
                                        </h5>
                                        <span class="b3 subtitle">Sr. UX Designer</span>
                                    </div>
                                    <div class="content">
                                        <p class="b1 description">At 29 years old, my favorite compliment is being
                                            told that I look like my mom. Seeing myself in her image, like this
                                            daughter up top, makes me so proud of how far I’ve come, and so thankful
                                            for where I come from.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Author  -->

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
            <p class="text-center text-body-secondary opacity-75">© 2023 Company, Inc</p>
        </footer>
    </div>

</body>

</html>
