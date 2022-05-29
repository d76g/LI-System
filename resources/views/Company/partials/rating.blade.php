<!DOCTYPE html>

<head>
    <style>

            input.star { display: none; }

            label.star {

            float: right;
            font-size: 18px;

            color: #ffffff;

            transition: all .2s;

            }

            input.star:checked ~ label.star:before {

            content: '\f005';

            color: #FD4;

            transition: all .25s;

            }
            input.star-5:checked ~ label.star:before {

            color: #FAFA37;

            text-shadow: 0 0 2px rgb(46, 42, 39);

            }

            input.star-1:checked ~ label.star:before { color: #FF824C; }
            input.star-2:checked ~ label.star:before { color: #FDCC0D; }
            label.star:hover { transform: rotate(-15deg) scale(0.7); color: #FDCC0D; }
            label.star:before {

            content: '\f006';

            font-family: FontAwesome;

            }
    </style>
</head>
<body>
        
        
        <div class="stars d-flex justify-content-start">
        
          <form action="{{route('rating.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <button type="submit">
            <input class="star star-5" id="star-5" type="radio" value="5" name="rating"/>
        
            <label class="star star-5" for="star-5"></label>
        
            <input class="star star-4" id="star-4" type="radio" value="4" name="rating"/>
        
            <label class="star star-4" for="star-4"></label>
        
            <input class="star star-3" id="star-3" type="radio" value="3" name="rating"/>
        
            <label class="star star-3" for="star-3"></label>
        
            <input class="star star-2" id="star-2" type="radio" value="2" name="rating"/>
        
            <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" value="1" name="rating"/>
                <label class="star star-1" for="star-1"></label>
            </button>
            <input type="hidden" name="Company_id" value="{{ $companyData->id }}" />
          </form>
        
        </div>      
        
</body>
</html>