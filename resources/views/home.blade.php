@extends('layouts.app')


@section('css')
    <style>

        .btn {
            margin-left: 10px;
            margin-right: 10px;
        }
        /* Boostrap Buttons Styling */
        
        .btn-default {
            font-family: Raleway-SemiBold;
            font-size: 13px;
            color: rgba(108, 88, 179, 0.75);
            letter-spacing: 1px;
            line-height: 15px;
            border: 2px solid rgba(108, 89, 179, 0.75);
            border-radius: 40px;
            background: transparent;
            transition: all 0.3s ease 0s;
        }
        
        .btn-default:hover {
            color: red;
            background: rgba(108, 88, 179, 0.75);
            border: 2px solid rgba(108, 89, 179, 0.75);
        }

        .img{
            width: 270px;
            height: 200px;
            margin-top: 10px;

        }
        /*            img:hover{
                        width: 280px;
                        height: 210px;
                    }*/
        h4:hover{
            color: violet;
            font: bold;

        }
        #pinBoot {
  position: relative;
  max-width: 100%;
  width: 100%;
}
.white-panel img {
  width: 100%;
  max-width: 100%;
  height: auto;
  border-radius: 4px 4px 5px 5px;
  transition: all 2s ease 0s;
  box-shadow:0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);
  transform: scale(0.95,1.05)
}
.white-panel {
  position: absolute;
  background: white;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
  padding: 0px;
  border-radius:4px;

}
/*
stylize any heading tags withing white-panel below
*/

.panel-contain h1 {
  font-size: 1.4em;
}
.panel-contain h1 a {
  color: #A92733;
}
.panel-contain{
    padding: 0px 20px 20px 20px;
}
/*.white-panel:hover {
  box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
  margin-top: -5px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}*/
.white-panel:hover img{
     box-shadow:0 7px 15px 0 rgba(0,0,0,.18), 0 4px 18px 0 rgba(0,0,0,.15);
}
        
    </style>
    
@endsection

@section('content')

<div class="container">
    <div class="row">
            @include('include.homenav')
    </div>
        
    <div class="row">
            @include('include.sidenav')
            
            <div class="col-md-12" >
                 @include('include.grid-card-content')

                 
            </div>
           
    </div>
    <div class="row">
        <div class="col-md-12">
           
                {{$places->links()}}
         
        </div>
    </div>
</div>

@endsection

@section('script')

    <script>
            function likePlace(id){
                $.post('{{ route('like') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
                    $('#like-'+id).css("color", "red");
                    $('#dislike-'+id).css("color", "#428bca");
                    
                    
                });
            }

            function dislikePlace(id){
                $.post('{{ route('dislike') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
                    $('#dislike-'+id).css("color", "red");
                    $('#like-'+id).css("color", "#428bca");
                    
                });
            }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pinBoot').pinterest_grid({
            no_columns: 3,
            padding_x: 10,
            padding_y: 10,
            margin_bottom: 50,
            single_column_breakpoint: 600
            });
          });

/*
Ref:
Thanks to:
http://www.jqueryscript.net/layout/Simple-jQuery-Plugin-To-Create-Pinterest-Style-Grid-Layout-Pinterest-Grid.html
*/


/*
    Pinterest Grid Plugin
    Copyright 2014 Mediademons
    @author smm 16/04/2014

    usage:

     $(document).ready(function() {

        $('#blog-landing').pinterest_grid({
            no_columns: 4
        });

    });


*/
;(function ($, window, document, undefined) {
    var pluginName = 'pinterest_grid',
        defaults = {
            padding_x: 10,
            padding_y: 10,
            no_columns: 3,
            margin_bottom: 50,
            single_column_breakpoint: 700
        },
        columns,
        $article,
        article_width;

    function Plugin(element, options) {
        this.element = element;
        this.options = $.extend({}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    Plugin.prototype.init = function () {
        var self = this,
            resize_finish;

        $(window).resize(function() {
            clearTimeout(resize_finish);
            resize_finish = setTimeout( function () {
                self.make_layout_change(self);
            }, 11);
        });

        self.make_layout_change(self);

        setTimeout(function() {
            $(window).resize();
        }, 500);
    };

    Plugin.prototype.calculate = function (single_column_mode) {
        var self = this,
            tallest = 0,
            row = 0,
            $container = $(this.element),
            container_width = $container.width();
            $article = $(this.element).children();

        if(single_column_mode === true) {
            article_width = $container.width() - self.options.padding_x;
        } else {
            article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
        }

        $article.each(function() {
            $(this).css('width', article_width);
        });

        columns = self.options.no_columns;

        $article.each(function(index) {
            var current_column,
                left_out = 0,
                top = 0,
                $this = $(this),
                prevAll = $this.prevAll(),
                tallest = 0;

            if(single_column_mode === false) {
                current_column = (index % columns);
            } else {
                current_column = 0;
            }

            for(var t = 0; t < columns; t++) {
                $this.removeClass('c'+t);
            }

            if(index % columns === 0) {
                row++;
            }

            $this.addClass('c' + current_column);
            $this.addClass('r' + row);

            prevAll.each(function(index) {
                if($(this).hasClass('c' + current_column)) {
                    top += $(this).outerHeight() + self.options.padding_y;
                }
            });

            if(single_column_mode === true) {
                left_out = 0;
            } else {
                left_out = (index % columns) * (article_width + self.options.padding_x);
            }

            $this.css({
                'left': left_out,
                'top' : top
            });
        });

        this.tallest($container);
        $(window).resize();
    };

    Plugin.prototype.tallest = function (_container) {
        var column_heights = [],
            largest = 0;

        for(var z = 0; z < columns; z++) {
            var temp_height = 0;
            _container.find('.c'+z).each(function() {
                temp_height += $(this).outerHeight();
            });
            column_heights[z] = temp_height;
        }

        largest = Math.max.apply(Math, column_heights);
        _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
    };

    Plugin.prototype.make_layout_change = function (_self) {
        if($(window).width() < _self.options.single_column_breakpoint) {
            _self.calculate(true);
        } else {
            _self.calculate(false);
        }
    };

    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName,
                new Plugin(this, options));
            }
        });
    }

})(jQuery, window, document);
    </script>
@endsection
