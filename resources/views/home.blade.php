<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome Home.</title>

    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="parallax-container">
        <div class="parallax-layer layer-0" data-parallax-speed="0.1" data-max-scroll="565"></div>
        <div class="parallax-layer layer-1" data-parallax-speed="0.4" data-max-scroll="565"></div>
        <div class="parallax-layer layer-2" data-parallax-speed="0.5" data-max-scroll="565"></div>
        <div class="parallax-layer layer-3" data-parallax-speed="0.6" data-max-scroll="565">

        </div>
        <div class="parallax-layer layer-4" data-parallax-speed="0.7" data-max-scroll="565"></div>
        <div class="parallax-layer layer-5" data-parallax-speed="0.65" data-max-scroll="565">
            <div class="menu">
                <a class="menu-home">Home</a>
                <a class="menu-gallery">Gallery</a>
                <a class="menu-music">Music</a>
                <a class="menu-about">About</a>
            </div>
            <a id='randomsong' href="" target="_blank"></a>
        </div>
    </div>

    <div class="content">

        <!-- <img class="quotecard" src="http://reloaded.literalhat.com/images/homebgcard.png"> -->
    </div>




    <style>
        body {
            margin: 0;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        .parallax-container {
            position: fixed;
            overflow: visible;
            width: 100vw;
            height: auto;

        }

        .parallax-layer {
            width: 100%;
            height: 130%;
            position: fixed;

            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .menu a {
            background-color: #e9cfb2;
            font-family: 'Cambria', 'Times New Roman', Times, serif;
            padding: 0.15vw 0.5vw;
            font-size: 1.3vw;
            box-shadow: 1px 1px 4px black;
        }

        .menu a:hover {
            background-color: black;
            color: white;
            cursor: pointer;
        }

        #randomsong {
            background-color: black;
            font-family: 'consolas', 'typewriter', 'Courier New', Courier, monospace;
            color: white;
            padding: 0.2vw 0.5vw;
            font-size: 0.8vw;
            box-shadow: 1px 1px 4px black;
            position: absolute;
            top: 62%;
            left: 76%;
            max-width: 24vw;
        }

        #randomsong:hover {
            background-color: white;
            color: black;
            cursor: pointer;
        }

        .menu-home {
            position: absolute;
            top: 58%;
            left: 35%;
            transform: rotate(2deg);
        }

        .menu-gallery {
            position: absolute;
            top: 62.5%;
            left: 36%;
            transform: rotate(-3deg);
        }

        .menu-music {
            position: absolute;
            top: 70%;
            left: 39%;
            transform: rotate(-2deg);
        }

        .menu-about {
            position: absolute;
            top: 74.5%;
            left: 38.5%;
            transform: rotate(1deg);
        }


        .layer-0 {
            z-index: 10;
            background-image: url('http://reloaded.literalhat.com/images/homebg.png');
            background-repeat: repeat;
        }

        .layer-1 {

            z-index: 11;
            background-image: url('http://reloaded.literalhat.com/images/home0.png');

        }

        .layer-2 {

            z-index: 12;
            background-image: url('http://reloaded.literalhat.com/images/home1.png');

        }

        .layer-3 {

            z-index: 13;
            background-image: url('http://reloaded.literalhat.com/images/home2.png');

        }

        .layer-4 {
            z-index: 14;
            background-image: url('http://reloaded.literalhat.com/images/home3.png');
        }

        .layer-5 {
            z-index: 15;
        }


        .content {
            position: absolute;
            top: 200vh;
            width: 100vw;
            height: 300vh;
            overflow: auto;
            flex-direction: column;
            align-items: center;
        }

        .quotecard {
            position: sticky;
            top: 10vh;
            width: 60vw;
            margin: auto;
            /* Center within its parent */
        }
    </style>

    <script>

        var ParallaxManager, ParallaxPart;

        ParallaxPart = (function () {
            function ParallaxPart(el) {
                this.el = el;
                this.speed = parseFloat(this.el.getAttribute('data-parallax-speed'));
                this.maxScroll = parseInt(this.el.getAttribute('data-max-scroll'));
            }

            ParallaxPart.prototype.update = function (scrollY) {
                var offset = -(scrollY * this.speed);
                this.setYTransform(offset);
            };


            ParallaxPart.prototype.setYTransform = function (val) {
                this.el.style.webkitTransform = "translate3d(0, " + val + "px, 0)";
                this.el.style.MozTransform = "translate3d(0, " + val + "px, 0)";
                this.el.style.OTransform = "translate3d(0, " + val + "px, 0)";
                this.el.style.transform = "translate3d(0, " + val + "px, 0)";
                this.el.style.msTransform = "translateY(" + val + "px)";
            };

            return ParallaxPart;

        })();

        ParallaxManager = (function () {
            ParallaxManager.prototype.parts = [];

            function ParallaxManager(elements) {
                if (Array.isArray(elements) && elements.length) {
                    this.elements = elements;
                }
                if (typeof elements === 'object' && elements.item) {
                    this.elements = Array.prototype.slice.call(elements);
                } else if (typeof elements === 'string') {
                    this.elements = document.querySelectorAll(elements);
                    if (this.elements.length === 0) {
                        throw new Error("Parallax: No elements found");
                    }
                    this.elements = Array.prototype.slice.call(this.elements);
                } else {
                    throw new Error("Parallax: Element variable is not a querySelector string, Array, or NodeList");
                }
                for (var i in this.elements) {
                    this.parts.push(new ParallaxPart(this.elements[i]));
                }
                window.addEventListener("scroll", this.onScroll.bind(this));
            }

            ParallaxManager.prototype.onScroll = function () {
                window.requestAnimationFrame(this.scrollHandler.bind(this));
            };

            ParallaxManager.prototype.scrollHandler = function () {
                var scrollY = Math.max(window.pageYOffset, 0);
                for (var i in this.parts) { this.parts[i].update(scrollY); }
            };

            return ParallaxManager;

        })();

        new ParallaxManager('.parallax-layer');



        const randomsong = document.getElementById('randomsong');

        const randomSongArray = {
            'bombtrack': 'https://www.youtube.com/watch?v=MUaL1FnotRQ',
            'worry': 'https://www.youtube.com/watch?v=Ub5oVqDX8dY',
            'violent pornography': 'https://www.youtube.com/watch?v=WWXcpWliHSY',
            'leave it alone': 'https://www.youtube.com/watch?v=cuR12uCt61Q',
            'epiphany': 'https://www.youtube.com/watch?v=bB1Ld1i9amY',
            'nikes': 'https://www.youtube.com/watch?v=rhJLfdCWrMI',
            'head': 'https://www.youtube.com/watch?v=sYsdvQSpabs',
            'do what you want': 'https://www.youtube.com/watch?v=s5F-xHX1PDE',
            'time bomb': 'https://www.youtube.com/watch?v=DhKHAopx7D0',

            'frijolero': 'https://www.youtube.com/watch?v=C468ckG8cfc',
            'gimme tha power': 'https://www.youtube.com/watch?v=rPDKPW3zTR0',
            'dance and dense denso': 'https://www.youtube.com/watch?v=PLQP7iu76F0',
            'miño': 'https://www.youtube.com/watch?v=gonXbFvxr9w',
            'arrancacorazones': 'https://www.youtube.com/watch?v=V4qgpaO5PkQ',
        };

        const si = ['frijolero', 'gimme tha power', 'dance and dense denso', 'miño', 'arrancacorazones'];

        const keysArray = Object.keys(randomSongArray);
        const randomIndex = Math.floor(Math.random() * keysArray.length);
        const randomKey = keysArray[randomIndex];
        const randomValue = randomSongArray[randomKey];

        const exclamation = si.includes(randomKey) ? '¡' : '';
        randomsong.innerHTML = "var audio = new Audio('" + exclamation + randomKey.replace(/ /g, "_") + "!.mp3');";
        randomsong.href = randomValue;







    </script>

</body>

</html>