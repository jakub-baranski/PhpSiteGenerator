$(document).ready(function () {
    $('[data-toggle="popover"]').popover()

    var customReveal = {
        viewFactor: 0.6,
        duration: 800
    };
    var barReveal = {
        origin: 'left',
        delay: 200,
        duration: 400,
        distance: '1000px',
        easing: 'ease-in-out'
    };

    var mainSecReveal = {
        origin: 'right',
        distance: '1000px',
        rotate: {x: 90, y: 0, z: 0},
        opacity: 0.4,
        duration: 1000,
        easing: 'ease-in-out'
    };


    window.sr = ScrollReveal();
    sr.reveal('.progress', barReveal, 50);
    sr.reveal('.main_section', mainSecReveal);
    sr.reveal('.story', customReveal);
    sr.reveal('.experience', customReveal);

    /*Sliders update*/
    $('.slider').find('input').on('input', function () {
        $(this).parent().find('label').text($(this).val() + " px");
    });

    /*GENERATOR*/
    /*Stworzyc JSON'a*/

    function FormParser() {
        var data = {};

        this.getTitle = function () {
            data.title = $('#titleInput').val();
        };
        this.getPanel = function () {
            var left = document.getElementById('leftCheck');
            var right = document.getElementById('rightCheck');
            if (left.checked && right.checked) {
                data.panel = 'both';
                data.leftWidth = Number($('#leftWidth').val());
            } else if (left.checked) {
                data.panel = 'left';
                data.leftWidth = Number($('#leftWidth').val());
            } else if (right.checked) {
                data.panel = 'right';
                data.rightWidth = Number($('#rightWidth').val());
            } else {
                data.panel = 'none';
            }
            data.leftPanelColor = $('#leftPanelColor').val();;
            data.rightPanelColor = $('#rightPanelColor').val(); ;
        };

        this.getHeader = function () {
            data.headerTitle = $('#headerTitle').val();
            data.headerSubtitle = $('#headerSubtitle').val();
            data.headerColor = encodeURIComponent($('#headerColor').val());
            data.headerColorText = encodeURIComponent($('#headerColorText').val());
            data.headerHeight = Number($('#headerHeight').val());
            data.headerAlign = $('#headerAlign').val();
        };

        this.getFooter = function () {
            data.footerTitle = $('#footerTitle').val();
            data.footerSubtitle = $('#footerSubtitle').val();
            data.footerColor = encodeURIComponent($('#footerColor').val());
            data.footerColorText = encodeURIComponent($('#footerColorText').val());
            data.footerHeight = Number($('#footerHeight').val());
            data.footerAlign = $('#footerAlign').val();
        };

        this.getNavbar = function () {
            data.navbarPos = $('#navbarPos').val();
            data.navbarColor = encodeURIComponent($('#navbarColor').val());
            data.navbarColorText = encodeURIComponent($('#navbarColorText').val());
        };

        this.getLinks = function () {
            var names = $('.linkNameInput');
            var links = $('.linkUrlInput');
            data.links = [];
            for (var i = 0; i < names.length; i++) {
                var name = names[i].value;
                var link = links[i].value;
                data.links[i] = {};
                data.links[i].name = name;
                data.links[i].link = link;
            }
        };

        this.getContent = function () {
            data.contentTitle = $('#contentTitle').val();
            data.contentColor = $('#contentColor').val();
            data.contentColorText = $('#contentColorText').val();
            data.contentAlign = $('#contentAlign').val();
            if (!document.getElementById('synonimizerCheckbox').checked) {
                data.contentText = $('#contentText').val();
            } else {
                if (!synonimize) {
                    var synonimize = new Synonimizer($('#contentText').val());
                }
                synonimize.processAll();
                data.contentText = synonimize.getString();
            }
        };

        this.parseAll = function () {
            this.getTitle();
            this.getPanel();
            this.getHeader();
            this.getFooter();
            this.getNavbar();
            this.getLinks();
            this.getContent();
            return data;
        };
    }
    $('#generateBtn').on('click', function () {
        var parser = new FormParser();
        var data = parser.parseAll();
        var json = JSON.stringify(data);
        $('#status').text("Generuję...").css('color', 'black');
        console.log(json);
        var date = new Date();
        var start = date.getTime();
        $.ajax({
            method: 'POST',
            url: 'generating.php',
            dataType: 'json',
            data: {json: json},
            success: function (data) {
                console.log(data);
                date = new Date();
                var time = date.getTime() - start;
                $('#status').html("Wygenerowano! (" + time + "ms)\t").css({color: 'green', "margin-right": "10px"}); //+ " ---> " + "<a href='http://www.marioku.comxa.com/generated/index.html' target='_blank'>Link</a>"+ "<a href='http://www.marioku.comxa.com/generated/page.zip'>Pobierz plik .zip</a>").css('color', 'green');
                $('<button/>', {type: 'button', class: "btn btn-primary"}).text("Zobacz stronę").css("margin-right", "10px").on('click', function(){window.open('http://www.marioku.comxa.com/generated/index.html');}).appendTo($('#status'));
                $('<button/>', {type: 'button', class: "btn btn-primary", onclick :"location.href = 'http://www.marioku.comxa.com/generated/page.zip'"}).text("Pobierz .zip").css("margin", "10px").appendTo($('#status'));
                
            },
            error: function () {
                $('#status').text("Błąd!").css('color', 'red');
            }
        });
    });

    /*dodawanie inputów*/
    $('#addBtn').on('click', function () {
        var $div = $('<div/>', {class: "form-group row"});
        $('<label/>', {class: "col-md-1"}).text("Nazwa: ").appendTo($div);
        $('<input/>', {class: "linkNameInput form-control", type: "text", value: ""}).appendTo($('<div/>', {class: "col-md-5"}).appendTo($div));
        $('<label/>', {class: "col-md-1"}).text("Link: ").appendTo($div);
        $('<input/>', {class: "linkUrlInput form-control", type: "text", value: ""}).appendTo($('<div/>', {class: "col-md-5"}).appendTo($div));
        $div.hide().appendTo($('.links')).fadeIn();
    });

    $('#removeBtn').on('click', function () {
        var $temp = $('.links').find('.row').last();
        $temp.fadeOut();
        setTimeout(function () {
            $temp.remove();
        }, 300);
    });



    function Synonimizer(str) {
        this.str = str;
        var delimiter = '|';
        var op = '{';
        var cl = "}";

        this.processInner = function () {
            var outS = '';
            var open = this.str.indexOf(op);
            if (open === -1)
                return false;
            var nextOpen = this.str.indexOf(op, open + 1);
            var close = this.str.indexOf(cl);
            while (nextOpen < close && nextOpen !== -1 && close !== -1) {
                open = nextOpen;
                nextOpen = this.str.indexOf(op, open + 1);
            }
            outS = this.str.substring(0, open) + this.chooseWord(this.str.substring(open + 1, close)) + this.str.substring(close + 1);
            this.str = outS;
            return true;
        };

        this.chooseWord = function (str) {
            var array = str.split(delimiter);
            for (var i in array) {
                array[i] = array[i].trim();
            }
            return array[Math.floor(Math.random() * array.length)];
        };

        this.setDelimiter = function (d) {
            delimiter = d;
        };

        this.setOpening = function (opening) {
            op = opening;
        };

        this.setClosing = function (closing) {
            cl = closing;
        };

        this.processAll = function () {
            while (true) {
                if (this.processInner() === false)
                    break;
            }
        };

        this.getString = function () {
            return this.str;
        };
    }


});




