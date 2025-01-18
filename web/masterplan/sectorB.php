<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterPlan</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link
rel="stylesheet"
href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
crossorigin="anonymous"
/>

<link href="css/toastr.css" rel="stylesheet">
<style>
body{
  font-family: 'Arial',sans-serif;
}
.font-arial{
  font-family: 'Arial',sans-serif;
  cursor: pointer;
}

.main{
    height: 95vh;
    overflow: hidden;
     width: 100%;
    margin: 0 auto;
    position: relative;
}

.cls-4,.cls-6,.cls-7,.cls-8{cursor: pointer;}
       
#controls {
    position: absolute;
    top: 10px;
    left: 10px;
    width: 50px !important;
}
.size-change {
    cursor: pointer;
    padding: 5px;
    transition: ease-in-out 0.20s;
    position: relative;
}

.size-change:hover {
    background: #676767;
    color: #fff;
}

.size-change:after {
	content: "";
	background: #afafaf;
	position: absolute;
	right: -2px;width: 1px;
	height: 145%;top: -5px;
}
.size-change:last-child:after{
	content: initial;

}
#controls svg{width:50px;}

#controls circle:hover {
    fill-opacity: 1;
}
.p_detail{     padding: 10px;
    z-index: 200;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 350px;
    height: 100vh;
    position: absolute;
    border-left: 1px solid #ccc;
    right: 0px;
    transition: ease-in-out 0.3s;
    -webkit-transition: ease-in-out 0.3s;
    transform: translate(0%, 0px);
}
.p_detail.p-hide {
    transform: translate(100%, 0px);
}
.d-none{
  display: none !important;
}
.table-sm td, .table-sm th {
    padding: 0.3rem;
    font-size: 14px;
}
.tp{
      display: none;
    min-width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 10px;
    position: absolute;
    z-index: 1;
    font-size:12px;
}

.close-detail{
   position: absolute;
    top: 10px;
    left: 10px;
    cursor: pointer;
}
.highlight{
 
    animation-duration: 1.7s;
    animation-name: blink;
    animation-iteration-count: infinite;
    -webkit-animation-duration: 1.7s;
    -webkit-animation-name: blink;
    -webkit-animation-iteration-count: infinite;
}

.greyBackground {
        background: #fbfbfb;
      }

      .legend-heading {
        background: #828282;
        padding: 0px 10px;
        font-size: 20px;
        display: inline-block;
        width: auto;
      }
      .form-text span {
        color: #000;
        display: inline-block;
      }

      .contact-2 {
        /* padding-top: 10rem; */
        /* padding-bottom: 7rem; */
      }

      .main-title {
        margin-bottom: 60px;
      }

      .main-title h1 {
        font-size: 34px;
        font-weight: 600;
        margin: 0 0 15px;
      }

      .legend-heading {
        background: #828282;
        padding: 0px 10px;
        font-size: 20px;
        display: inline-block;
        width: auto;
        color: white;
      }

      fieldset {
        border: 1px solid #c0c0c0;
        margin: 0 2px;
        padding: 0.35em 0.625em 0.75em;
      }

      .form-check {
        position: relative;
        display: block;
        padding-left: 1.25rem;
      }

      .form-text {
        display: block;
        margin-top: 0.25rem;
      }

      .form-text span {
        color: #000;
        display: inline-block;
      }

      .form-check p,
      .form-check ul {
        display: inline-block;
        padding-left: 10px;
        vertical-align: top;
        margin: 0;
      }

      ul {
        margin: 0;
        padding: 0;
        list-style: none;
        color: #535353;
      }

      p {
        font-size: 16px;
        line-height: 25px;
        color: #535353;
        font-weight: 400;
        font-family: "Montserrat", sans-serif;
        margin-top: 0;
        margin-bottom: 1rem;
      }
      .contact-2 .form-control {
        padding: 10px 17px;
        color: #495057 !important;
        width: 100%;
        min-height: 50px;
        font-size: 15px;
        font-weight: 500;
        border-radius: 3px;
        background: #ffffff;
        border: 1px solid #dbdbdb;
        box-shadow: 0 1px 3px 0 rgb(0 0 0 / 6%);
      }

      .form-control {
        display: block;
        line-height: 1.5;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      }

		.crossIcon {
		top: 10px;
		right: 0px;
		font-size: 22px;
		position: absolute;
		cursor: pointer;
		}

	.booking-form{
		width: 100%;
		position: absolute;
		left: 0;
		top: 0;
		transition:ease-in-out 0.44s;
		-webkit-transition:ease-in-out 0.44s;
		-moz-transition:ease-in-out 0.44s;
		transform: translateX(-100%);
		z-index: 9999;
	}
	  
	.form-display{
		transform:translateX(0%);
	}

   @keyframes blink {
      0% {
     
      fill:#cecece;
    }
    50%{
      
      fill:#ffffff;

    }
    100% {
     
       fill:#cecece;
    }
}
@-webkit-keyframes blink {
     0% {
     
      fill:#cecece;
    }
    50%{
      
      fill:#ffffff;

    }
    100% {
 
       fill:#cecece;
    }
}



    </style>


   </head>
<body>
   
    <div class="">
            <div class="">
                <div class="main " id="SVGContainer">

                  <span class="tp">Street : <span class="st">B</span>, Plot No : <span class="pln">20</span></span>

                  <div class="p_detail p-hide">
                     <svg class="close-detail" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
                      </svg>
                     <div class="loading d-none">
                        <img src="g.gif" style="width:100%;" alt="">
                     </div>
                     <div class="detail d-none" style="width:100%;">
                      <h5 class="bg-light mb-3 px-2 py-2 rounded shadow-sm">Plot Details</h5>
                        <table class="table table-bordered table-sm table-striped detail-table"></table>
                        
                     </div>

                  </div>

                  

<svg version="1.1" id="SVG" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15.62425708770752 335.3172302246094 531.968017578125 755.135986328125" style="enable-background:new 0 0 831.2 1179.9;" xml:space="preserve" preserveAspectRatio="xMidYMid meet">
<style type="text/css">
g rect,
rect + text,
polygon + text {
    cursor: pointer;
}

</style>
<g id="garden-elements-sector-b">
  <polygon fill="#858B90" points="132.665,342.891 405.51,342.891 405.51,540.547 218.71,562.324  "></polygon>
  
    <rect x="234.489" y="410.72" fill="#7DA84E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="44.608" height="15.181"></rect>
  
    <rect x="307.689" y="453.467" fill="#7FA280" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.08" height="0.838"></rect>
  
    <rect x="286.828" y="453.651" fill="#7FA280" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.082" height="0.839"></rect>
  <path fill="#7DA84E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M379.398,395.538h-47.59v43.864
    c0,0-0.651,1.675,1.58,2.143c0,0,4.004,1.119,5.494,5.868c0,0,0.745,0.931,2.055,0.647l25.236,0.097L379.398,395.538z"></path>
  <path fill="#7DA84E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M246.225,462.5
    c0-2.054-1.771-3.726-3.818-3.726l0,0c-2.05,0-3.722,1.77-3.722,3.813v0.843c0,2.051,1.77,3.727,3.813,3.727l0,0
    c2.049,0,3.727-1.772,3.727-3.816V462.5L246.225,462.5z"></path>
  <path fill="#7DA84E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M299.214,459.893
    c0,0.932-0.745,1.769-1.774,1.769h-11.549c-0.931,0-1.582-0.74-1.582-1.769l0,0c0-0.932,0.559-1.771,1.582-1.771h11.549
    C298.562,458.123,299.214,458.961,299.214,459.893L299.214,459.893z"></path>
  <path fill="#7DA84E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M276.583,462.5
    c0-2.054-1.77-3.726-3.813-3.726l0,0c-2.053,0-3.542,1.77-3.542,3.813v0.843c0,2.051,1.583,3.727,3.633,3.727l0,0
    c2.053,0,3.725-1.772,3.725-3.816L276.583,462.5L276.583,462.5z"></path>
  <polygon fill="#7DA84E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="365.896,536.166 366.361,520.146 
    366.549,506.362 363.193,503.943 362.915,505.152 358.538,511.766 364.126,521.917 362.729,530.671 353.323,537.563   "></polygon>
  <polygon fill="#7DA84E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="171.346,413.512 165.664,395.634 
    187.365,395.446 182.428,400.938 178.611,403.735 177.026,410.626   "></polygon>
  <g>
    <polyline fill="#D0D5DA" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="216.886,482.429 238.958,482.988 
      246.225,483.081 245.105,472.744 269.226,475.632 269.599,546.876 220.984,553.768 212.23,523.034 216.794,482.896    "></polyline>
    <text transform="matrix(1 0 0 1 228.6855 500.0264)" font-family="'MyriadPro-Regular'" font-size="3.069">G.D.A RESERVED AREA</text>
    <text transform="matrix(1 0 0 1 234.4658 519.375)" font-family="'MyriadPro-Regular'" font-size="7.1315">Radio</text>
    <text transform="matrix(1 0 0 1 230.4941 527.9316)" font-family="'MyriadPro-Regular'" font-size="7.1315">Pakistan</text>
  </g>
  <g>
    <circle fill="#7FA280" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" cx="328.645" cy="450.487" r="3.26"></circle>
    <g>
      <g>
        <path fill="#8CB347" d="M331.438,450.952c0.279-0.372,0.373-0.741,0.373-1.118s-0.19-0.841-0.563-1.119
          c-0.09-0.093-0.09-0.093-0.188-0.19v-0.087c0-0.559-0.559-0.932-1.022-0.932c-0.089,0-0.089,0-0.187,0
          c-0.093-0.093-0.19-0.28-0.281-0.373c-0.279-0.28-0.651-0.374-1.12-0.374c-0.468,0-0.839,0.281-1.118,0.654
          c-0.094,0-0.281,0-0.467,0c-0.74,0-1.397,0.744-1.489,1.398h-0.187l0,0c0,0.091-0.093,0.187-0.191,0.278
          c-0.279,0.28-0.367,0.743-0.367,1.212c0,0.372,0.559,0.842,0.559,1.021l0,0c0,0.096,0.278,0.19,0.371,0.28v0.093l0,0l0,0l0,0
          v0.093c0,0.373,0.189,0.742,0.561,1.021c0.371,0.283,0.74,0.371,1.119,0.371c0.188,0,0.373-0.088,0.56-0.188
          c0.28,0.188,0.562,0.188,0.841,0.188s0.467-0.088,0.648-0.188c0.191,0.092,0.467,0.092,0.744,0.092
          c0.839,0,1.4-0.841,1.304-1.581C331.438,451.323,331.438,451.139,331.438,450.952z"></path>
        <path fill="#8CB347" d="M325.384,448.715L325.384,448.715L325.384,448.715z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M329.574,447.506L329.574,447.506c0-0.191-0.092-0.28-0.188-0.373c-0.281-0.279-0.65-0.37-1.119-0.37
          c-0.471,0-0.84,0.277-1.119,0.65c-0.094,0-0.282,0-0.467,0c-0.742,0-1.305,0.744-1.305,1.399c0,0,0,0-0.089,0l0,0
          c-0.095,0.09-0.19,0.186-0.28,0.277c-0.281,0.28-0.467,0.743-0.371,1.212c0,0.372,0.188,0.841,0.559,1.021l0,0
          c0.094,0.096,0.188,0.19,0.373,0.19l0,0l0,0l0,0l0,0v0.093c0,0.369,0.188,0.743,0.559,1.021
          c0.373,0.281,0.744,0.373,1.118,0.373c0.19,0,0.374,0,0.56-0.092c-0.646-0.188-1.117-0.744-1.3-1.397
          c-0.372-0.372-0.56-0.842-0.56-1.304c0-1.024,0.839-1.863,1.859-1.863c0.371-0.465,0.932-0.838,1.584-0.931
          C329.48,447.506,329.574,447.506,329.574,447.506z"></path>
        <path fill="#8CB347" d="M325.384,448.715L325.384,448.715L325.384,448.715z"></path>
      </g>
    </g>
  </g>
  <g>
    
      <ellipse fill="#7FA280" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0011" cx="257.864" cy="455.049" rx="3.26" ry="3.26"></ellipse>
    <g>
      <g>
        <path fill="#8CB347" d="M260.657,455.517c0.28-0.369,0.373-0.741,0.373-1.118s-0.19-0.84-0.56-1.119
          c-0.092-0.092-0.092-0.092-0.189-0.189v-0.091c0-0.559-0.56-0.932-1.021-0.932c-0.092,0-0.092,0-0.19,0
          c-0.092-0.091-0.187-0.28-0.279-0.37c-0.28-0.28-0.652-0.373-1.121-0.373c-0.467,0-0.839,0.28-1.119,0.652
          c-0.092,0-0.28,0-0.466,0c-0.745,0-1.401,0.741-1.493,1.397h-0.188l0,0c0,0.093-0.091,0.189-0.188,0.281
          c-0.279,0.28-0.371,0.742-0.371,1.212c0,0.367,0.558,0.837,0.558,1.02l0,0c0,0.094,0.279,0.19,0.372,0.28v0.093l0,0l0,0l0,0
          v0.092c0,0.371,0.188,0.742,0.56,1.021c0.372,0.28,0.744,0.372,1.118,0.372c0.191,0,0.373-0.092,0.563-0.188
          c0.279,0.188,0.559,0.188,0.837,0.188c0.281,0,0.466-0.092,0.652-0.188c0.188,0.091,0.466,0.091,0.741,0.091
          c0.843,0,1.401-0.841,1.304-1.581C260.657,455.887,260.751,455.702,260.657,455.517z"></path>
        <path fill="#8CB347" d="M254.791,453.467L254.791,453.467L254.791,453.467z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M258.795,452.162L258.795,452.162c0-0.187-0.093-0.278-0.188-0.373
          c-0.279-0.278-0.651-0.366-1.121-0.366c-0.465,0-0.839,0.277-1.119,0.646c-0.093,0-0.279,0-0.467,0
          c-0.743,0-1.301,0.746-1.301,1.4c0,0,0,0-0.091,0l0,0c-0.094,0.093-0.189,0.189-0.282,0.28c-0.279,0.278-0.467,0.743-0.371,1.21
          c0,0.373,0.188,0.842,0.559,1.024l0,0c0.094,0.092,0.19,0.188,0.373,0.188l0,0l0,0l0,0l0,0v0.09
          c0,0.372,0.188,0.744,0.558,1.023c0.372,0.28,0.745,0.372,1.122,0.372c0.188,0,0.369,0,0.56-0.092
          c-0.652-0.19-1.122-0.745-1.303-1.401c-0.373-0.368-0.561-0.839-0.561-1.3c0-1.023,0.84-1.867,1.864-1.867
          c0.372-0.465,0.932-0.838,1.582-0.93C258.702,452.069,258.795,452.162,258.795,452.162z"></path>
        <path fill="#8CB347" d="M254.791,453.467L254.791,453.467L254.791,453.467z"></path>
      </g>
    </g>
  </g>
  <g>
    <g>
      <rect x="341.309" y="450.58" fill="#FFFFFF" width="1.301" height="0.278"></rect>
      <rect x="343.17" y="450.487" fill="#FFFFFF" width="1.305" height="0.277"></rect>
      <rect x="345.035" y="450.487" fill="#FFFFFF" width="1.303" height="0.277"></rect>
      <rect x="346.896" y="450.487" fill="#FFFFFF" width="1.305" height="0.277"></rect>
      <rect x="348.761" y="450.487" fill="#FFFFFF" width="1.302" height="0.277"></rect>
      <rect x="350.622" y="450.392" fill="#FFFFFF" width="1.304" height="0.28"></rect>
      <rect x="352.391" y="450.392" fill="#FFFFFF" width="1.305" height="0.28"></rect>
      <rect x="354.161" y="450.487" fill="#FFFFFF" width="1.304" height="0.277"></rect>
      <rect x="356.023" y="450.487" fill="#FFFFFF" width="1.301" height="0.277"></rect>
      <rect x="357.699" y="450.487" fill="#FFFFFF" width="1.305" height="0.277"></rect>
      <rect x="359.563" y="450.487" fill="#FFFFFF" width="1.304" height="0.277"></rect>
      <rect x="361.332" y="450.392" fill="#FFFFFF" width="1.304" height="0.28"></rect>
      <rect x="363.193" y="450.487" fill="#FFFFFF" width="1.306" height="0.277"></rect>
      <rect x="365.059" y="450.487" fill="#FFFFFF" width="1.303" height="0.277"></rect>
      <rect x="366.919" y="450.487" fill="#FFFFFF" width="1.306" height="0.277"></rect>
      <rect x="368.782" y="450.392" fill="#FFFFFF" width="1.304" height="0.28"></rect>
      <rect x="370.645" y="450.487" fill="#FFFFFF" width="1.304" height="0.277"></rect>
      <rect x="372.508" y="450.487" fill="#FFFFFF" width="1.303" height="0.277"></rect>
    </g>
    <g>
      <rect x="341.588" y="456.539" fill="#FFFFFF" width="1.301" height="0.279"></rect>
      <rect x="343.45" y="456.539" fill="#FFFFFF" width="1.301" height="0.279"></rect>
      <rect x="345.128" y="456.539" fill="#FFFFFF" width="1.302" height="0.279"></rect>
      <rect x="346.99" y="456.539" fill="#FFFFFF" width="1.303" height="0.279"></rect>
      <rect x="348.854" y="456.539" fill="#FFFFFF" width="1.304" height="0.279"></rect>
      <rect x="350.622" y="456.539" fill="#FFFFFF" width="1.304" height="0.279"></rect>
      <rect x="352.484" y="456.446" fill="#FFFFFF" width="1.302" height="0.282"></rect>
      <rect x="354.255" y="456.446" fill="#FFFFFF" width="1.304" height="0.282"></rect>
      <rect x="356.117" y="456.539" fill="#FFFFFF" width="1.304" height="0.279"></rect>
      <rect x="357.979" y="456.633" fill="#FFFFFF" width="1.305" height="0.279"></rect>
      <rect x="359.843" y="456.539" fill="#FFFFFF" width="1.304" height="0.279"></rect>
      <rect x="361.705" y="456.539" fill="#FFFFFF" width="1.302" height="0.279"></rect>
      <rect x="363.382" y="456.539" fill="#FFFFFF" width="1.302" height="0.279"></rect>
      <rect x="365.243" y="456.446" fill="#FFFFFF" width="1.302" height="0.282"></rect>
      <rect x="367.016" y="456.539" fill="#FFFFFF" width="1.301" height="0.279"></rect>
      <rect x="368.876" y="456.539" fill="#FFFFFF" width="1.304" height="0.279"></rect>
      <rect x="370.738" y="456.539" fill="#FFFFFF" width="1.304" height="0.279"></rect>
      <rect x="372.508" y="456.539" fill="#FFFFFF" width="1.303" height="0.279"></rect>
    </g>
    <g>
      <g>
        <g>
          <path fill="#8CB347" d="M373.813,451.884c-0.19-0.095-0.371-0.188-0.56-0.188c-0.19,0-0.373,0.09-0.467,0.279l-0.095,0.091
            c0,0,0,0-0.088,0c-0.279,0-0.373,0.279-0.373,0.467v0.092c-0.092,0-0.092,0.09-0.188,0.09c-0.093,0.19-0.188,0.28-0.188,0.466
            c0,0.188,0.091,0.373,0.278,0.467c0,0.094,0,0.094,0,0.19c0,0.373,0.37,0.559,0.743,0.559l0,0l0,0c0,0,0.088,0.094,0.088,0.19
            c0.191,0.089,0.191,0.188,0.373,0.188c0.189,0,0.374-0.188,0.374-0.188l0,0c0,0,0-0.092,0.091-0.19h-0.091l0,0h0.187h0.093
            h0.091c0.188,0,0.374-0.092,0.467-0.28c0.094-0.186,0.189-0.277,0.189-0.559c0-0.092,0-0.188-0.092-0.278
            c0.092-0.094,0.092-0.28,0.092-0.372c0-0.091,0-0.188-0.092-0.28c0-0.092,0.092-0.187,0.092-0.372
            c0-0.37-0.37-0.649-0.743-0.649C373.904,451.696,373.904,451.789,373.813,451.884z"></path>
          <path fill="#8CB347" d="M372.787,454.49L372.787,454.49L372.787,454.49z"></path>
        </g>
        <g>
          <path fill="#8CB347" d="M372.136,452.627L372.136,452.627c-0.091,0-0.091,0-0.188,0.093c-0.091,0.188-0.189,0.28-0.189,0.468
            c0,0.188,0.093,0.371,0.281,0.466c0,0.09,0,0.09,0,0.189c0,0.369,0.37,0.559,0.743,0.559l0,0l0,0
            c0,0.092,0.092,0.092,0.092,0.092c0.188,0.092,0.368,0.188,0.561,0.188c0.186,0,0.371-0.091,0.465-0.278l0,0
            c0-0.094,0.093-0.094,0.093-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.091,0c0.188,0,0.37-0.093,0.467-0.278
            c0.092-0.19,0.189-0.28,0.189-0.563c0-0.091,0-0.189-0.092-0.277c-0.094,0.277-0.373,0.56-0.651,0.56
            c-0.188,0.189-0.373,0.279-0.651,0.279c-0.466,0-0.839-0.371-0.839-0.839C372.322,453.188,372.136,453,372.136,452.627
            L372.136,452.627z"></path>
          <path fill="#8CB347" d="M372.787,454.49L372.787,454.49L372.787,454.49z"></path>
        </g>
      </g>
      <g>
        <g>
          <path fill="#8CB347" d="M368.689,451.789c-0.188-0.093-0.369-0.188-0.56-0.188c-0.188,0-0.372,0.093-0.465,0.278l-0.095,0.095
            c0,0,0,0-0.092,0c-0.278,0-0.369,0.276-0.369,0.467v0.09c-0.092,0-0.092,0.093-0.19,0.093c-0.088,0.188-0.187,0.28-0.187,0.467
            c0,0.188,0.09,0.369,0.279,0.466c0,0.093,0,0.093,0,0.188c0,0.371,0.372,0.562,0.74,0.562l0,0l0,0c0,0,0.093,0.091,0.093,0.188
            c0.189,0.092,0.372,0.188,0.56,0.188c0.19,0,0.561-0.188,0.561-0.188l0,0c0,0,0-0.092,0.094-0.188h-0.094l0,0l0,0l0,0
            c0,0,0,0,0.094,0c0.188,0,0.37-0.092,0.467-0.28c0.088-0.188,0.187-0.28,0.187-0.562c0-0.087,0-0.185-0.093-0.28
            c0.093-0.088,0.093-0.276,0.093-0.369s0-0.188-0.093-0.28c0-0.089,0.093-0.187,0.093-0.369c0-0.373-0.372-0.651-0.741-0.651
            C368.876,451.696,368.689,451.789,368.689,451.789z"></path>
          <path fill="#8CB347" d="M367.852,454.397L367.852,454.397L367.852,454.397z"></path>
        </g>
        <g>
          <path fill="#8CB347" d="M367.292,452.535C367.105,452.535,367.105,452.535,367.292,452.535c-0.092,0-0.092,0-0.187,0.092
            c-0.095,0.188-0.191,0.281-0.191,0.467c0,0.189,0.093,0.373,0.279,0.466c0,0.094,0,0.094,0,0.188c0,0.37,0.373,0.56,0.744,0.56
            l0,0l0,0c0,0.093,0.092,0.093,0.092,0.093c0.188,0.092,0.371,0.188,0.561,0.188c0.188,0,0.37-0.091,0.467-0.281l0,0
            c0-0.091,0.092-0.091,0.092-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.093,0c0.188,0,0.368-0.091,0.465-0.278
            c0.093-0.188,0.19-0.28,0.19-0.56c0-0.093,0-0.188-0.094-0.28c-0.092,0.28-0.371,0.56-0.648,0.56
            c-0.188,0.188-0.375,0.28-0.652,0.28c-0.466,0-0.839-0.372-0.839-0.84C367.292,453.094,367.016,452.908,367.292,452.535
            C367.105,452.535,367.105,452.535,367.292,452.535z"></path>
          <path fill="#8CB347" d="M367.852,454.397L367.852,454.397L367.852,454.397z"></path>
        </g>
      </g>
      <g>
        <g>
          <path fill="#8CB347" d="M363.566,451.789c-0.188-0.093-0.373-0.188-0.561-0.188c-0.188,0.093-0.371,0.093-0.467,0.278
            l-0.089,0.095c0,0,0,0-0.093,0c-0.279,0-0.371,0.276-0.371,0.467v0.09c-0.092,0-0.092,0.093-0.188,0.093
            c-0.092,0.188-0.188,0.28-0.188,0.467c0,0.188,0.093,0.369,0.281,0.466c0,0.093,0,0.093,0,0.188
            c0,0.371,0.369,0.562,0.742,0.562l0,0l0,0c0,0,0.092,0.091,0.092,0.188c0.188,0.092,0.559,0.188,0.74,0.188
            c0.188,0,0.743-0.188,0.743-0.188l0,0c0,0,0-0.092,0.095-0.188h-0.095l0,0h-0.188h-0.09l0,0c0.188,0,0.373-0.092,0.467-0.28
            c0.093-0.188,0.188-0.28,0.188-0.562c0-0.087,0-0.185-0.091-0.28c0.091-0.088,0.091-0.276,0.091-0.369s0-0.188-0.091-0.28
            c0-0.089,0.091-0.187,0.091-0.369c0-0.373-0.373-0.651-0.743-0.651C363.848,451.696,363.66,451.789,363.566,451.789z"></path>
          <path fill="#8CB347" d="M362.729,454.49L362.729,454.49L362.729,454.49z"></path>
        </g>
        <g>
          <path fill="#8CB347" d="M362.171,452.627C362.171,452.627,362.075,452.627,362.171,452.627c-0.093,0-0.093,0-0.19,0.093
            c-0.09,0.188-0.188,0.28-0.188,0.468c0,0.188,0.09,0.371,0.279,0.466c0,0.09,0,0.09,0,0.189c0,0.369,0.373,0.559,0.74,0.559
            l0,0l0,0c0,0.092,0.094,0.092,0.094,0.092c0.189,0.092,0.369,0.188,0.559,0.188c0.189-0.091,0.372-0.091,0.467-0.278l0,0
            c0-0.094,0.094-0.094,0.094-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.09,0c0.188,0,0.373-0.093,0.467-0.278
            c0.09-0.19,0.188-0.28,0.188-0.563c0-0.091,0-0.189-0.092-0.277c-0.091,0.277-0.369,0.56-0.648,0.56
            c-0.19,0.189-0.373,0.279-0.651,0.279c-0.467,0-0.843-0.371-0.843-0.839C362.264,453.188,362.171,453,362.171,452.627
            L362.171,452.627z"></path>
          <path fill="#8CB347" d="M362.729,454.49L362.729,454.49L362.729,454.49z"></path>
        </g>
      </g>
      <g>
        <g>
          <path fill="#8CB347" d="M358.631,451.789c-0.186-0.093-0.371-0.188-0.558-0.188c-0.188,0.093-0.374,0.093-0.468,0.278
            l-0.092,0.095c0,0,0,0-0.093,0c-0.278,0-0.372,0.276-0.372,0.467v0.09c-0.09,0-0.09,0.093-0.188,0.093
            c-0.094,0.188-0.188,0.28-0.188,0.467c0,0.188,0.09,0.369,0.279,0.466c0,0.093,0,0.093,0,0.188c0,0.371,0.369,0.562,0.74,0.562
            l0,0l0,0c0,0,0.093,0.091,0.093,0.188c0.188,0.092,0.28,0.188,0.466,0.188c0.191,0,0.371-0.188,0.371-0.188l0,0
            c0,0,0-0.092,0.093-0.188h-0.093l0,0h0.093h0.091h0.092c0.188,0,0.371-0.092,0.469-0.28c0.088-0.188,0.185-0.28,0.185-0.562
            c0-0.087,0-0.185-0.092-0.28c0.092-0.088,0.092-0.276,0.092-0.369s0-0.188-0.092-0.28c0-0.089,0.092-0.187,0.092-0.369
            c0-0.373-0.368-0.651-0.741-0.651C358.911,451.789,358.631,451.789,358.631,451.789z"></path>
          <path fill="#8CB347" d="M357.605,454.49L357.605,454.49L357.605,454.49z"></path>
        </g>
        <g>
          <path fill="#8CB347" d="M357.049,452.535L357.049,452.535c-0.09,0-0.09,0-0.188,0.092c-0.094,0.188-0.188,0.281-0.188,0.467
            c0,0.189,0.091,0.373,0.281,0.466c0,0.094,0,0.094,0,0.188c0,0.37,0.368,0.56,0.739,0.56l0,0l0,0
            c0,0.093,0.094,0.093,0.094,0.093c0.188,0.092,0.372,0.188,0.559,0.188c0.188,0,0.372-0.091,0.469-0.281l0,0
            c0-0.091,0.09-0.091,0.09-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.092,0c0.188,0,0.373-0.091,0.465-0.278
            c0.094-0.188,0.189-0.28,0.189-0.56c0-0.093,0-0.188-0.092-0.28c-0.093,0.28-0.371,0.56-0.649,0.56
            c-0.188,0.188-0.374,0.28-0.652,0.28c-0.467,0-0.839-0.372-0.839-0.84C357.421,453.188,357.143,452.908,357.049,452.535
            L357.049,452.535z"></path>
          <path fill="#8CB347" d="M357.605,454.49L357.605,454.49L357.605,454.49z"></path>
        </g>
      </g>
      <g>
        <g>
          <path fill="#8CB347" d="M353.789,451.789c-0.188-0.093-0.371-0.188-0.561-0.188c-0.188,0-0.371,0.093-0.467,0.278l-0.09,0.096
            c0,0,0,0-0.093,0c-0.278,0-0.372,0.278-0.372,0.466v0.092c-0.088,0-0.088,0.092-0.186,0.092c-0.094,0.19-0.19,0.281-0.19,0.468
            c0,0.188,0.092,0.37,0.278,0.466c0,0.092,0,0.092,0,0.188c0,0.37,0.373,0.56,0.742,0.56l0,0l0,0c0,0,0.096,0.092,0.096,0.19
            c0.187,0.091,0.466,0.187,0.65,0.187c0.186,0,0.56-0.187,0.56-0.187l0,0c0,0,0-0.093,0.089-0.19h-0.089l0,0l0,0l0,0l0,0
            c0.188,0,0.37-0.091,0.466-0.279c0.092-0.188,0.189-0.279,0.189-0.562c0-0.087,0-0.185-0.094-0.28
            c0.094-0.089,0.094-0.276,0.094-0.366c0-0.097,0-0.19-0.094-0.282c0-0.091,0.094-0.188,0.094-0.371
            c0-0.373-0.373-0.651-0.744-0.651C353.882,451.696,353.882,451.789,353.789,451.789z"></path>
          <path fill="#8CB347" d="M352.766,454.49L352.766,454.49L352.766,454.49z"></path>
        </g>
        <g>
          <path fill="#8CB347" d="M352.111,452.535L352.111,452.535c-0.088,0-0.088,0-0.188,0.092c-0.092,0.188-0.188,0.281-0.188,0.467
            c0,0.189,0.091,0.373,0.279,0.466c0,0.094,0,0.094,0,0.188c0,0.37,0.368,0.56,0.742,0.56l0,0l0,0
            c0,0.093,0.092,0.093,0.092,0.093c0.188,0.092,0.373,0.188,0.561,0.188s0.37-0.091,0.467-0.281l0,0
            c0-0.091,0.089-0.091,0.089-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.093,0c0.188,0,0.373-0.091,0.465-0.278
            c0.093-0.188,0.188-0.28,0.188-0.56c0-0.093,0-0.188-0.092-0.28c-0.088,0.28-0.373,0.56-0.652,0.56
            c-0.188,0.188-0.368,0.28-0.651,0.28c-0.465,0-0.836-0.372-0.836-0.84C352.299,453.094,352.111,452.908,352.111,452.535
            L352.111,452.535z"></path>
          <path fill="#8CB347" d="M352.766,454.49L352.766,454.49L352.766,454.49z"></path>
        </g>
      </g>
      <g>
        <g>
          <path fill="#8CB347" d="M348.761,451.789c-0.188-0.093-0.37-0.188-0.56-0.188c-0.188,0-0.372,0.093-0.467,0.278l-0.092,0.095
            c0,0,0,0-0.094,0c-0.279,0-0.367,0.276-0.367,0.467v0.09c-0.095,0-0.095,0.093-0.19,0.093c-0.095,0.188-0.188,0.28-0.188,0.467
            c0,0.188,0.09,0.369,0.278,0.466c0,0.093,0,0.093,0,0.188c0,0.371,0.374,0.562,0.742,0.562l0,0l0,0
            c0,0,0.092,0.091,0.092,0.188c0.188,0.092,0.188,0.188,0.372,0.188c0.188,0,0.279-0.188,0.279-0.188l0,0
            c0,0,0-0.092,0.093-0.188h-0.093l0,0h0.279h0.094h0.09c0.189,0,0.371-0.092,0.467-0.28c0.089-0.188,0.188-0.28,0.188-0.562
            c0-0.087,0-0.185-0.091-0.28c0.091-0.088,0.091-0.276,0.091-0.369s0-0.188-0.091-0.28c0-0.089,0.091-0.187,0.091-0.369
            c0-0.373-0.373-0.651-0.74-0.651C348.854,451.696,348.761,451.789,348.761,451.789z"></path>
          <path fill="#8CB347" d="M347.829,454.49L347.829,454.49L347.829,454.49z"></path>
        </g>
        <g>
          <path fill="#8CB347" d="M347.176,452.627L347.176,452.627c-0.09,0-0.09,0-0.188,0.093c-0.094,0.188-0.188,0.28-0.188,0.468
            c0,0.188,0.09,0.371,0.279,0.466c0,0.09,0,0.09,0,0.189c0,0.369,0.373,0.559,0.74,0.559l0,0l0,0
            c0,0.092,0.094,0.092,0.094,0.092c0.188,0.092,0.373,0.188,0.559,0.188c0.19,0,0.372-0.091,0.469-0.278l0,0
            c0-0.094,0.09-0.094,0.09-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.093,0c0.187,0,0.372-0.093,0.465-0.278
            c0.097-0.19,0.19-0.28,0.19-0.563c0-0.091,0-0.189-0.092-0.277c-0.09,0.277-0.369,0.56-0.65,0.56
            c-0.188,0.189-0.37,0.279-0.649,0.279c-0.467,0-0.842-0.371-0.842-0.839C347.27,453.188,347.082,453,347.176,452.627
            L347.176,452.627z"></path>
          <path fill="#8CB347" d="M347.829,454.49L347.829,454.49L347.829,454.49z"></path>
        </g>
      </g>
      <g>
        <g>
          <path fill="#8CB347" d="M343.545,451.789c-0.188-0.093-0.372-0.188-0.561-0.188c-0.188,0-0.371,0.093-0.465,0.278l-0.095,0.095
            c0,0,0,0-0.091,0c-0.279,0-0.372,0.276-0.372,0.467v0.09c-0.089,0-0.089,0.093-0.187,0.093
            c-0.094,0.188-0.188,0.28-0.188,0.467c0,0.188,0.091,0.369,0.28,0.466c0,0.093,0,0.093,0,0.188c0,0.371,0.371,0.562,0.74,0.562
            l0,0l0,0c0,0,0.094,0.091,0.094,0.188c0.188,0.092,0.277,0.188,0.559,0.188c0.189,0,0.469-0.188,0.469-0.188l0,0
            c0,0,0-0.092,0.088-0.188h-0.088l0,0h0.088l0,0h0.094c0.186,0,0.372-0.092,0.465-0.28s0.188-0.28,0.188-0.562
            c0-0.087,0-0.185-0.092-0.28c0.092-0.088,0.092-0.276,0.092-0.369s0-0.188-0.092-0.28c0-0.089,0.092-0.187,0.092-0.369
            c0-0.373-0.371-0.651-0.742-0.651C343.73,451.696,343.636,451.789,343.545,451.789z"></path>
          <path fill="#8CB347" d="M342.704,454.49L342.704,454.49L342.704,454.49z"></path>
        </g>
        <g>
          <path fill="#8CB347" d="M342.146,452.535C342.146,452.535,342.055,452.535,342.146,452.535c-0.092,0-0.092,0-0.187,0.092
            c-0.093,0.188-0.19,0.281-0.19,0.467c0,0.189,0.094,0.373,0.279,0.466c0,0.094,0,0.094,0,0.188c0,0.37,0.372,0.56,0.745,0.56
            l0,0l0,0c0,0.093,0.088,0.093,0.088,0.093c0.191,0.092,0.373,0.188,0.56,0.188c0.189,0,0.373-0.091,0.469-0.281l0,0
            c0-0.091,0.092-0.091,0.092-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.09,0c0.19,0,0.372-0.091,0.467-0.278
            c0.094-0.188,0.188-0.28,0.188-0.56c0-0.093,0-0.188-0.088-0.28c-0.095,0.28-0.374,0.56-0.652,0.56
            c-0.19,0.188-0.372,0.28-0.651,0.28c-0.469,0-0.84-0.372-0.84-0.84C342.239,453.094,342.146,452.908,342.146,452.535
            L342.146,452.535z"></path>
          <path fill="#8CB347" d="M342.704,454.49L342.704,454.49L342.704,454.49z"></path>
        </g>
      </g>
    </g>
  </g>
  <g>
    <rect x="286.268" y="450.766" fill="#FFFFFF" width="1.301" height="0.28"></rect>
    <rect x="288.131" y="450.766" fill="#FFFFFF" width="1.3" height="0.28"></rect>
    <rect x="289.995" y="450.672" fill="#FFFFFF" width="1.299" height="0.28"></rect>
    <rect x="291.671" y="450.766" fill="#FFFFFF" width="1.303" height="0.28"></rect>
    <rect x="293.533" y="450.766" fill="#FFFFFF" width="1.303" height="0.28"></rect>
    <rect x="295.209" y="450.672" fill="#FFFFFF" width="1.301" height="0.28"></rect>
    <rect x="297.07" y="450.766" fill="#FFFFFF" width="1.304" height="0.28"></rect>
    <rect x="306.29" y="450.766" fill="#FFFFFF" width="1.306" height="0.28"></rect>
    <rect x="308.154" y="450.672" fill="#FFFFFF" width="1.304" height="0.28"></rect>
    <rect x="310.018" y="450.672" fill="#FFFFFF" width="1.305" height="0.28"></rect>
    <rect x="311.88" y="450.766" fill="#FFFFFF" width="1.304" height="0.28"></rect>
    <rect x="313.648" y="450.858" fill="#FFFFFF" width="1.301" height="0.279"></rect>
    <rect x="315.51" y="450.766" fill="#FFFFFF" width="1.305" height="0.28"></rect>
    <rect x="317.096" y="450.766" fill="#FFFFFF" width="1.305" height="0.28"></rect>
  </g>
  <g>
    <rect x="286.362" y="456.818" fill="#FFFFFF" width="1.303" height="0.279"></rect>
    <rect x="288.225" y="456.818" fill="#FFFFFF" width="1.304" height="0.279"></rect>
    <rect x="290.087" y="456.818" fill="#FFFFFF" width="1.303" height="0.279"></rect>
    <rect x="291.856" y="456.726" fill="#FFFFFF" width="1.303" height="0.278"></rect>
    <rect x="293.721" y="456.726" fill="#FFFFFF" width="1.301" height="0.278"></rect>
    <rect x="295.583" y="456.726" fill="#FFFFFF" width="1.303" height="0.278"></rect>
    <rect x="297.166" y="456.818" fill="#FFFFFF" width="1.302" height="0.279"></rect>
    <rect x="306.386" y="456.818" fill="#FFFFFF" width="1.302" height="0.279"></rect>
    <rect x="308.247" y="456.818" fill="#FFFFFF" width="1.303" height="0.279"></rect>
    <rect x="310.109" y="456.818" fill="#FFFFFF" width="1.305" height="0.279"></rect>
    <rect x="311.975" y="456.818" fill="#FFFFFF" width="1.301" height="0.279"></rect>
    <rect x="313.743" y="456.818" fill="#FFFFFF" width="1.302" height="0.279"></rect>
    <rect x="315.605" y="456.818" fill="#FFFFFF" width="1.302" height="0.279"></rect>
    <rect x="317.468" y="456.726" fill="#FFFFFF" width="1.302" height="0.278"></rect>
  </g>
  <g>
    <g>
      <rect x="325.477" y="493.979" fill="#FFFFFF" width="0.279" height="1.304"></rect>
      <rect x="325.477" y="492.115" fill="#FFFFFF" width="0.279" height="1.304"></rect>
      <rect x="325.477" y="490.253" fill="#FFFFFF" width="0.279" height="1.304"></rect>
      <rect x="325.57" y="488.483" fill="#FFFFFF" width="0.277" height="1.302"></rect>
      <rect x="325.57" y="486.621" fill="#FFFFFF" width="0.277" height="1.301"></rect>
      <rect x="325.57" y="484.851" fill="#FFFFFF" width="0.277" height="1.305"></rect>
      <rect x="325.477" y="483.081" fill="#FFFFFF" width="0.279" height="1.305"></rect>
      <rect x="325.477" y="481.218" fill="#FFFFFF" width="0.279" height="1.306"></rect>
      <rect x="325.477" y="479.45" fill="#FFFFFF" width="0.279" height="1.299"></rect>
      <rect x="325.57" y="477.586" fill="#FFFFFF" width="0.277" height="1.301"></rect>
      <rect x="325.477" y="475.817" fill="#FFFFFF" width="0.279" height="1.304"></rect>
      <rect x="325.57" y="473.861" fill="#FFFFFF" width="0.277" height="1.304"></rect>
      <rect x="325.57" y="472.093" fill="#FFFFFF" width="0.277" height="1.299"></rect>
      <rect x="325.477" y="470.229" fill="#FFFFFF" width="0.279" height="1.3"></rect>
      <rect x="325.477" y="468.367" fill="#FFFFFF" width="0.279" height="1.3"></rect>
      <rect x="325.57" y="466.598" fill="#FFFFFF" width="0.277" height="1.304"></rect>
      <rect x="325.57" y="464.736" fill="#FFFFFF" width="0.277" height="1.303"></rect>
      <rect x="325.477" y="462.965" fill="#FFFFFF" width="0.279" height="1.304"></rect>
    </g>
    <g>
      <rect x="331.623" y="493.885" fill="#FFFFFF" width="0.279" height="1.3"></rect>
      <rect x="331.531" y="492.115" fill="#FFFFFF" width="0.277" height="1.304"></rect>
      <rect x="331.531" y="490.253" fill="#FFFFFF" width="0.277" height="1.304"></rect>
      <rect x="331.623" y="488.483" fill="#FFFFFF" width="0.279" height="1.302"></rect>
      <rect x="331.531" y="486.621" fill="#FFFFFF" width="0.277" height="1.301"></rect>
      <rect x="331.623" y="484.758" fill="#FFFFFF" width="0.279" height="1.304"></rect>
      <rect x="331.623" y="482.988" fill="#FFFFFF" width="0.279" height="1.304"></rect>
      <rect x="331.623" y="481.126" fill="#FFFFFF" width="0.279" height="1.302"></rect>
      <rect x="331.531" y="479.356" fill="#FFFFFF" width="0.277" height="1.304"></rect>
      <rect x="331.531" y="477.493" fill="#FFFFFF" width="0.277" height="1.305"></rect>
      <rect x="331.531" y="475.632" fill="#FFFFFF" width="0.277" height="1.302"></rect>
      <rect x="331.623" y="473.861" fill="#FFFFFF" width="0.279" height="1.304"></rect>
      <rect x="331.623" y="471.999" fill="#FFFFFF" width="0.279" height="1.305"></rect>
      <rect x="331.623" y="470.229" fill="#FFFFFF" width="0.279" height="1.3"></rect>
      <rect x="331.623" y="468.367" fill="#FFFFFF" width="0.279" height="1.3"></rect>
      <rect x="331.531" y="466.598" fill="#FFFFFF" width="0.277" height="1.304"></rect>
      <rect x="331.531" y="464.736" fill="#FFFFFF" width="0.277" height="1.303"></rect>
      <rect x="331.531" y="462.872" fill="#FFFFFF" width="0.277" height="1.3"></rect>
    </g>
  </g>
  <path fill="#7DA84E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M231.88,434.561v35.856
    c0,0,0.465,2.7-3.352,2.979l-16.112-0.56c0,0-2.886-2.98-3.071-5.215l-12.854-33.063c0,0-0.56-1.954,2.606-2.607h30.082
    C229.459,432.141,231.415,432.979,231.88,434.561z"></path>
  <g>
    
      <text transform="matrix(0.4707 1.2998 -0.9402 0.3407 155.5605 384.5254)" fill="#FFFFFF" font-family="'MyriadPro-Cond'" font-size="2.149">20’-0” WIDE STREET</text>
  </g>
  
    <rect x="331.884" y="395.607" fill="#AA967F" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="16.435" height="17.534"></rect>
  
    <rect x="348.251" y="395.607" fill="#AA967F" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="18.188" height="17.534"></rect>
  <text transform="matrix(1 0 0 1 333.6543 405.7666)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="3.9514">Mosque</text>
  <text transform="matrix(1 0 0 1 350.3936 405.7666)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="3.9514">Hospital</text>
  <text transform="matrix(1 0 0 1 338.5605 422.415)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="5.857">PARK</text>
  <g>
    <rect x="392.438" y="370.486" fill="#FFFFFF" width="0.19" height="158.508"></rect>
    <rect x="396.162" y="370.486" fill="#FFFFFF" width="0.19" height="158.508"></rect>
    
      <rect x="393.834" y="370.765" fill="#7FA280" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="0.84" height="155.529"></rect>
  </g>
  <g>
    <rect x="386.85" y="437.82" fill="#FFFFFF" width="0.373" height="1.77"></rect>
    <rect x="386.85" y="442.85" fill="#FFFFFF" width="0.373" height="1.771"></rect>
    <rect x="386.756" y="447.783" fill="#FFFFFF" width="0.373" height="1.771"></rect>
    <rect x="386.85" y="452.72" fill="#FFFFFF" width="0.373" height="1.771"></rect>
    <rect x="386.85" y="457.656" fill="#FFFFFF" width="0.373" height="1.773"></rect>
    <rect x="386.756" y="462.779" fill="#FFFFFF" width="0.373" height="1.771"></rect>
    <rect x="386.85" y="467.621" fill="#FFFFFF" width="0.373" height="1.771"></rect>
    <rect x="386.85" y="472.557" fill="#FFFFFF" width="0.373" height="1.771"></rect>
    <rect x="386.756" y="477.586" fill="#FFFFFF" width="0.373" height="1.771"></rect>
    <rect x="386.85" y="482.522" fill="#FFFFFF" width="0.373" height="1.771"></rect>
    <rect x="386.85" y="487.553" fill="#FFFFFF" width="0.373" height="1.77"></rect>
    <rect x="386.756" y="492.487" fill="#FFFFFF" width="0.373" height="1.771"></rect>
    <rect x="386.85" y="497.424" fill="#FFFFFF" width="0.373" height="1.77"></rect>
    <rect x="386.85" y="502.359" fill="#FFFFFF" width="0.373" height="1.771"></rect>
    <rect x="386.756" y="507.389" fill="#FFFFFF" width="0.373" height="1.77"></rect>
    <rect x="386.85" y="512.324" fill="#FFFFFF" width="0.373" height="1.77"></rect>
    <rect x="386.85" y="517.261" fill="#FFFFFF" width="0.373" height="1.77"></rect>
    <rect x="386.756" y="522.196" fill="#FFFFFF" width="0.373" height="1.772"></rect>
    <rect x="386.85" y="527.318" fill="#FFFFFF" width="0.373" height="1.771"></rect>
  </g>
  
    <text transform="matrix(-1.245233e-005 -1 1 -1.245233e-005 388.1016 434.1758)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.6696">200’-0” WIDE-SARWAN AVENUE</text>
  <g>
    <rect x="306.756" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="310.576" y="362.664" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="314.579" y="362.759" fill="#FFFFFF" width="2.791" height="0.559"></rect>
    <rect x="318.491" y="362.759" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="322.311" y="362.664" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="326.036" y="362.759" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="330.04" y="362.759" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="333.766" y="362.759" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="337.77" y="362.759" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="341.682" y="362.759" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="345.501" y="362.759" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="349.227" y="362.759" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="353.229" y="362.664" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="357.049" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="360.959" y="362.759" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="364.87" y="362.664" fill="#FFFFFF" width="2.796" height="0.559"></rect>
    <rect x="368.689" y="362.664" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="372.415" y="362.759" fill="#FFFFFF" width="2.793" height="0.559"></rect>
  </g>
  <g>
    <rect x="260.751" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="264.477" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="268.479" y="362.851" fill="#FFFFFF" width="2.791" height="0.559"></rect>
    <rect x="272.299" y="362.851" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="276.117" y="362.851" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="280.123" y="362.851" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="283.94" y="362.851" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="287.666" y="362.851" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="291.484" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="295.488" y="362.759" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="299.401" y="362.851" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="303.219" y="362.759" fill="#FFFFFF" width="2.79" height="0.559"></rect>
  </g>
  <g>
    <rect x="355.093" y="472.185" fill="#6F5E2A" width="2.142" height="7.823"></rect>
    
      <text transform="matrix(9.299795e-004 -1 1 9.299795e-004 356.5986 478.5156)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">STREET 1</text>
  </g>
  <g>
    <rect x="332.184" y="475.073" fill="#6F5E2A" width="2.142" height="7.819"></rect>
    
      <text transform="matrix(9.299795e-004 -1 1 9.299795e-004 333.6543 481.4209)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">STREET 2</text>
  </g>
  <g>
    <rect x="323.614" y="474.233" fill="#6F5E2A" width="2.142" height="7.819"></rect>
    
      <text transform="matrix(9.299795e-004 -1 1 9.299795e-004 325.1357 480.6113)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">STREET 2</text>
  </g>
  <g>
    <polygon fill="#6F5E2A" points="326.779,432.605 328.924,432.605 328.924,440.426 326.779,440.706     "></polygon>
    
      <text transform="matrix(9.299795e-004 -1 1 9.299795e-004 328.3037 438.8779)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">STREET 2</text>
  </g>
  <g>
    <rect x="302.38" y="494.91" fill="#6F5E2A" width="2.142" height="7.821"></rect>
    
      <text transform="matrix(9.299795e-004 -1 1 9.299795e-004 303.9033 501.2695)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">STREET 3</text>
  </g>
  <g>
    <rect x="279.843" y="494.91" fill="#6F5E2A" width="2.143" height="7.821"></rect>
    
      <text transform="matrix(9.299795e-004 -1 1 9.299795e-004 281.4053 501.2744)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">STREET 4</text>
  </g>
  <g>
    <rect x="234.675" y="467.343" fill="#6F5E2A" width="2.142" height="7.822"></rect>
    
      <text transform="matrix(9.299795e-004 -1 1 9.299795e-004 236.1079 473.7393)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">STREET 5</text>
  </g>
  <rect x="380.05" y="395.538" fill="#FFFFFF" width="0.283" height="52.619"></rect>
  <rect x="380.424" y="458.588" fill="#FFFFFF" width="0.279" height="76.092"></rect>
  <g>
    <rect x="190.812" y="362.759" fill="#FFFFFF" width="2.792" height="0.559"></rect>
    <rect x="194.628" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="198.446" y="362.759" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="202.173" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="206.177" y="362.664" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="209.996" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="214" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="217.817" y="362.664" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="221.636" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="225.361" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="229.181" y="362.759" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="233.277" y="362.759" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="237.096" y="362.664" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="241.008" y="362.759" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="244.732" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="248.644" y="362.664" fill="#FFFFFF" width="2.792" height="0.559"></rect>
    <rect x="252.37" y="362.851" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="256.467" y="362.759" fill="#FFFFFF" width="2.792" height="0.559"></rect>
  </g>
  <g>
    <rect x="152.349" y="362.851" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="156.258" y="362.759" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="159.983" y="362.851" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="163.896" y="362.942" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="167.619" y="362.851" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="171.72" y="362.851" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="175.538" y="362.759" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="179.354" y="362.851" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="183.172" y="362.851" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="187.085" y="362.759" fill="#FFFFFF" width="2.794" height="0.559"></rect>
  </g>
  <g>
    <rect x="324.452" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
    <rect x="328.177" y="388.554" fill="#FFFFFF" width="2.796" height="0.56"></rect>
    <rect x="331.996" y="388.554" fill="#FFFFFF" width="2.793" height="0.56"></rect>
    <rect x="335.908" y="388.461" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="339.82" y="388.461" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="343.636" y="388.646" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="347.456" y="388.554" fill="#FFFFFF" width="2.789" height="0.56"></rect>
    <rect x="351.367" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
    <rect x="355.186" y="388.554" fill="#FFFFFF" width="2.795" height="0.56"></rect>
    <rect x="359.004" y="388.554" fill="#FFFFFF" width="2.793" height="0.56"></rect>
    <rect x="362.915" y="388.554" fill="#FFFFFF" width="2.795" height="0.56"></rect>
    <rect x="366.919" y="388.461" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="370.552" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
    <rect x="374.464" y="388.554" fill="#FFFFFF" width="2.793" height="0.56"></rect>
  </g>
  <g>
    <rect x="278.165" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
    <rect x="282.171" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="285.803" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="289.716" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="293.626" y="388.646" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="297.445" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="301.262" y="388.646" fill="#FFFFFF" width="2.795" height="0.559"></rect>
    <rect x="305.358" y="388.646" fill="#FFFFFF" width="2.792" height="0.559"></rect>
    <rect x="309.086" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
    <rect x="312.904" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="316.723" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="320.729" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
  </g>
  <g>
    <rect x="208.132" y="388.554" fill="#FFFFFF" width="2.795" height="0.56"></rect>
    <rect x="212.043" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
    <rect x="215.862" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
    <rect x="219.774" y="388.461" fill="#FFFFFF" width="2.792" height="0.559"></rect>
    <rect x="223.499" y="388.554" fill="#FFFFFF" width="2.793" height="0.56"></rect>
    <rect x="227.503" y="388.554" fill="#FFFFFF" width="2.795" height="0.56"></rect>
    <rect x="231.322" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
    <rect x="235.141" y="388.554" fill="#FFFFFF" width="2.792" height="0.56"></rect>
    <rect x="239.145" y="388.554" fill="#FFFFFF" width="2.792" height="0.56"></rect>
    <rect x="242.962" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
    <rect x="246.781" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
  </g>
  <g>
    <rect x="165.852" y="388.74" fill="#FFFFFF" width="2.793" height="0.558"></rect>
    <rect x="169.764" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="173.673" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="177.492" y="388.554" fill="#FFFFFF" width="2.793" height="0.56"></rect>
    <rect x="181.31" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="185.223" y="388.646" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="189.04" y="388.554" fill="#FFFFFF" width="2.793" height="0.56"></rect>
    <rect x="192.858" y="388.646" fill="#FFFFFF" width="2.793" height="0.559"></rect>
    <rect x="196.771" y="388.646" fill="#FFFFFF" width="2.794" height="0.559"></rect>
    <rect x="200.682" y="388.554" fill="#FFFFFF" width="2.794" height="0.56"></rect>
    <rect x="204.407" y="388.646" fill="#FFFFFF" width="2.792" height="0.559"></rect>
  </g>
  
    <text transform="matrix(-1.245233e-005 -1 1 -1.245233e-005 354.3574 484.8271)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.909">50’-0” WIDE ROAD</text>
  
    <text transform="matrix(-1.245233e-005 -1 1 -1.245233e-005 304.0156 492.2754)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.909">50’-0” WIDE ROAD</text>
  
    <text transform="matrix(-1.245233e-005 -1 1 -1.245233e-005 329.0459 430.6504)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.909">50’-0” WIDE ROAD</text>
  
    <text transform="matrix(-1.245233e-005 -1 1 -1.245233e-005 281.374 492.7637)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.909">50’-0” WIDE ROAD</text>
  
    <text transform="matrix(-1.245233e-005 -1 1 -1.245233e-005 236.3818 464.4336)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.909">50’-0” WIDE ROAD</text>
  
    <text transform="matrix(0.3657 0.9307 -0.9307 0.3657 191.3945 435.3037)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.9088">50’-0” WIDE ROAD</text>
  
    <text transform="matrix(1 -0.0036 0.0036 1 239.2036 407.5215)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.9094">50’-0” WIDE ROAD</text>
  
    <text transform="matrix(1 -0.0036 0.0036 1 253.0635 389.5918)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.9094">80’-0” WIDE ROAD</text>
  
    <text transform="matrix(1 -0.0036 0.0036 1 249.1021 429.708)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.9094">50’-0” WIDE ROAD</text>
  <g>
    
      <rect x="339.918" y="526.859" transform="matrix(0.9923 -0.1236 0.1236 0.9923 -62.5439 46.1445)" fill="#FFFFFF" width="1.208" height="0.281"></rect>
    
      <rect x="342.112" y="526.621" transform="matrix(0.9926 -0.1217 0.1217 0.9926 -61.5373 45.6057)" fill="#FFFFFF" width="1.212" height="0.279"></rect>
    
      <rect x="344.208" y="526.224" transform="matrix(0.9925 -0.1226 0.1226 0.9925 -61.9524 46.2631)" fill="#FFFFFF" width="1.21" height="0.28"></rect>
    
      <rect x="346.26" y="526.179" transform="matrix(0.9924 -0.1233 0.1233 0.9924 -62.2676 46.8012)" fill="#FFFFFF" width="1.211" height="0.276"></rect>
    
      <rect x="348.192" y="525.715" transform="matrix(0.9925 -0.1221 0.1221 0.9925 -61.5985 46.5181)" fill="#FFFFFF" width="1.12" height="0.278"></rect>
    
      <rect x="350.449" y="525.607" transform="matrix(0.9925 -0.1226 0.1226 0.9925 -61.8299 47.0238)" fill="#FFFFFF" width="1.21" height="0.282"></rect>
    
      <rect x="352.679" y="525.192" transform="matrix(0.9924 -0.1234 0.1234 0.9924 -62.1447 47.6266)" fill="#FFFFFF" width="1.21" height="0.282"></rect>
    
      <rect x="354.531" y="524.992" transform="matrix(0.9924 -0.1234 0.1234 0.9924 -62.082 47.8267)" fill="#FFFFFF" width="1.116" height="0.283"></rect>
    <g>
      
        <rect x="347.092" y="524.34" transform="matrix(0.9924 -0.1228 0.1228 0.9924 -61.8813 47.095)" fill="#403F2B" width="7.823" height="2.143"></rect>
      
        <text transform="matrix(0.9926 -0.1217 0.1217 0.9926 349.1826 526.0547)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3367">LANE 1</text>
    </g>
    
      <rect x="281.873" y="533.648" transform="matrix(0.9926 -0.1217 0.1217 0.9926 -62.8449 38.3271)" fill="#FFFFFF" width="1.116" height="0.28"></rect>
    
      <rect x="284.019" y="533.469" transform="matrix(0.9926 -0.1216 0.1216 0.9926 -62.7807 38.5684)" fill="#FFFFFF" width="1.116" height="0.277"></rect>
    
      <rect x="286.193" y="533.282" transform="matrix(0.9925 -0.1224 0.1224 0.9925 -63.1448 39.1163)" fill="#FFFFFF" width="1.117" height="0.279"></rect>
    
      <rect x="281.873" y="533.648" transform="matrix(0.9926 -0.1217 0.1217 0.9926 -62.8449 38.3271)" fill="#FFFFFF" width="1.116" height="0.28"></rect>
    
      <rect x="284.019" y="533.469" transform="matrix(0.9926 -0.1216 0.1216 0.9926 -62.7807 38.5684)" fill="#FFFFFF" width="1.116" height="0.277"></rect>
    
      <rect x="286.193" y="533.282" transform="matrix(0.9925 -0.1224 0.1224 0.9925 -63.1448 39.1163)" fill="#FFFFFF" width="1.117" height="0.279"></rect>
    
      <rect x="288.143" y="532.979" transform="matrix(0.9923 -0.1243 0.1243 0.9923 -64.0031 40.0023)" fill="#FFFFFF" width="1.116" height="0.282"></rect>
    
      <rect x="288.143" y="532.979" transform="matrix(0.9923 -0.1243 0.1243 0.9923 -64.0031 40.0023)" fill="#FFFFFF" width="1.116" height="0.282"></rect>
    
      <rect x="290.36" y="532.701" transform="matrix(0.9925 -0.1222 0.1222 0.9925 -62.9104 39.5277)" fill="#FFFFFF" width="1.119" height="0.276"></rect>
    
      <rect x="292.503" y="532.492" transform="matrix(0.9924 -0.1232 0.1232 0.9924 -63.4016 40.1729)" fill="#FFFFFF" width="1.117" height="0.281"></rect>
    
      <rect x="294.851" y="532.407" transform="matrix(0.9924 -0.1227 0.1227 0.9924 -63.1079 40.2741)" fill="#FFFFFF" width="1.21" height="0.282"></rect>
    
      <rect x="296.861" y="532.178" transform="matrix(0.9926 -0.1217 0.1217 0.9926 -62.5494 40.1421)" fill="#FFFFFF" width="1.212" height="0.278"></rect>
    
      <rect x="298.759" y="531.625" transform="matrix(0.9925 -0.122 0.122 0.9925 -62.6309 40.4822)" fill="#FFFFFF" width="1.113" height="0.281"></rect>
    
      <rect x="300.768" y="531.385" transform="matrix(0.9923 -0.124 0.124 0.9923 -63.6007 41.4795)" fill="#FFFFFF" width="1.118" height="0.282"></rect>
    
      <rect x="302.993" y="531.117" transform="matrix(0.9926 -0.1215 0.1215 0.9926 -62.302 40.8197)" fill="#FFFFFF" width="1.117" height="0.283"></rect>
    
      <rect x="305.214" y="531.013" transform="matrix(0.9924 -0.1227 0.1227 0.9924 -62.8553 41.5266)" fill="#FFFFFF" width="1.114" height="0.281"></rect>
    
      <rect x="307.613" y="530.707" transform="matrix(0.9924 -0.1234 0.1234 0.9924 -63.17 42.1059)" fill="#FFFFFF" width="1.21" height="0.279"></rect>
    
      <rect x="309.506" y="530.691" transform="matrix(0.9925 -0.1218 0.1218 0.9925 -62.3707 41.7423)" fill="#FFFFFF" width="1.21" height="0.28"></rect>
    
      <rect x="311.615" y="530.177" transform="matrix(0.9925 -0.1224 0.1224 0.9925 -62.5867 42.2216)" fill="#FFFFFF" width="1.212" height="0.278"></rect>
    
      <rect x="313.613" y="529.901" transform="matrix(0.9926 -0.1217 0.1217 0.9926 -62.1531 42.1609)" fill="#FFFFFF" width="1.116" height="0.278"></rect>
    
      <rect x="315.916" y="529.845" transform="matrix(0.9922 -0.1243 0.1243 0.9922 -63.4385 43.4663)" fill="#FFFFFF" width="1.21" height="0.281"></rect>
    <g>
      
        <rect x="292.952" y="531.149" transform="matrix(0.9925 -0.1226 0.1226 0.9925 -63.0022 40.4042)" fill="#403F2B" width="7.823" height="2.143"></rect>
      
        <text transform="matrix(0.9926 -0.1217 0.1217 0.9926 294.876 532.7686)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3367">LANE 1</text>
    </g>
    
      <text transform="matrix(1.0942 -0.1392 0.1262 0.992 319.6992 530.333)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.1518">50’-0” WIDE ROAD</text>
  </g>
  <g>
    <g>
      
        <rect x="321.6" y="504.362" transform="matrix(0.9924 -0.1227 0.1227 0.9924 -59.5774 43.7762)" fill="#403F2B" width="7.821" height="2.144"></rect>
      
        <text transform="matrix(0.9926 -0.1217 0.1217 0.9926 323.6621 506.1895)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3367">LANE 2</text>
    </g>
    
      <rect x="282.004" y="510.869" transform="matrix(0.9927 -0.1205 0.1205 0.9927 -59.5366 37.7862)" fill="#FFFFFF" width="1.118" height="0.278"></rect>
    
      <rect x="283.993" y="510.662" transform="matrix(0.9926 -0.1216 0.1216 0.9926 -60.0076 38.3961)" fill="#FFFFFF" width="1.116" height="0.283"></rect>
    
      <rect x="286.14" y="510.528" transform="matrix(0.9924 -0.1233 0.1233 0.9924 -60.769 39.2401)" fill="#FFFFFF" width="1.117" height="0.283"></rect>
    
      <rect x="282.004" y="510.869" transform="matrix(0.9927 -0.1205 0.1205 0.9927 -59.5366 37.7862)" fill="#FFFFFF" width="1.118" height="0.278"></rect>
    
      <rect x="283.993" y="510.662" transform="matrix(0.9926 -0.1216 0.1216 0.9926 -60.0076 38.3961)" fill="#FFFFFF" width="1.116" height="0.283"></rect>
    
      <rect x="286.14" y="510.528" transform="matrix(0.9924 -0.1233 0.1233 0.9924 -60.769 39.2401)" fill="#FFFFFF" width="1.117" height="0.283"></rect>
    
      <rect x="288.537" y="510.287" transform="matrix(0.9923 -0.1237 0.1237 0.9923 -60.9128 39.6822)" fill="#FFFFFF" width="1.208" height="0.283"></rect>
    
      <rect x="288.537" y="510.287" transform="matrix(0.9923 -0.1237 0.1237 0.9923 -60.9128 39.6822)" fill="#FFFFFF" width="1.208" height="0.283"></rect>
    
      <rect x="290.344" y="509.832" transform="matrix(0.9925 -0.1224 0.1224 0.9925 -60.2174 39.4294)" fill="#FFFFFF" width="1.117" height="0.276"></rect>
    
      <rect x="292.525" y="509.697" transform="matrix(0.9922 -0.1244 0.1244 0.9922 -61.1274 40.4048)" fill="#FFFFFF" width="1.115" height="0.282"></rect>
    
      <rect x="294.778" y="509.646" transform="matrix(0.9924 -0.1233 0.1233 0.9924 -60.6216 40.3252)" fill="#FFFFFF" width="1.211" height="0.279"></rect>
    
      <rect x="296.951" y="509.444" transform="matrix(0.9926 -0.1218 0.1218 0.9926 -59.8292 40.0191)" fill="#FFFFFF" width="1.211" height="0.28"></rect>
    
      <rect x="298.822" y="508.786" transform="matrix(0.9926 -0.1216 0.1216 0.9926 -59.6691 40.1855)" fill="#FFFFFF" width="1.116" height="0.278"></rect>
    
      <rect x="300.756" y="508.686" transform="matrix(0.9925 -0.1226 0.1226 0.9925 -60.1248 40.7916)" fill="#FFFFFF" width="1.115" height="0.282"></rect>
    <g>
      
        <rect x="292.953" y="508.333" transform="matrix(0.9925 -0.1225 0.1225 0.9925 -60.1437 40.1853)" fill="#403F2B" width="7.824" height="2.144"></rect>
      
        <text transform="matrix(0.9926 -0.1217 0.1217 0.9926 294.876 510.002)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3367">LANE 2</text>
    </g>
    
      <text transform="matrix(1.0942 -0.1392 0.1262 0.992 303.5166 509.1582)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="2.1518">50’-0” WIDE ROAD</text>
  </g>
  <path fill="none" stroke="#FCFCFC" stroke-width="0.25" stroke-miterlimit="10" stroke-dasharray="1" d="M364.033,499.007
    c0,0-19.936-10.71-33.619,5.496"></path>
  
    <line fill="none" stroke="#FCFCFC" stroke-width="0.25" stroke-miterlimit="10" stroke-dasharray="1" x1="280.588" y1="513.535" x2="280.775" y2="529.367"></line>
  
    <line fill="none" stroke="#FCFCFC" stroke-width="0.25" stroke-miterlimit="10" stroke-dasharray="1" x1="280.775" y1="459.798" x2="280.868" y2="468.46"></line>
  
    <line fill="none" stroke="#FCFCFC" stroke-width="0.25" stroke-miterlimit="10" stroke-dasharray="1" x1="303.126" y1="459.52" x2="303.126" y2="469.577"></line>
  <g>
    <g>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" x1="235.605" y1="475.817" x2="235.605" y2="476.283"></line>
      <path fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" stroke-dasharray="1.0185,1.0185" d="
        M209.811,474.607c0,0-1.675-1.213-8.938-17.696"></path>
      <path fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" d="M200.682,456.353
        c-0.093-0.188-0.093-0.277-0.188-0.467"></path>
    </g>
  </g>
  <g>
    
      <rect x="202.798" y="459.427" transform="matrix(0.9218 -0.3877 0.3877 0.9218 -163.687 115.2756)" fill="#6F5E2A" width="2.141" height="7.822"></rect>
    
      <text transform="matrix(0.3868 0.9222 -0.9222 0.3868 202.5293 461.1758)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3367">STREET 6</text>
  </g>
  <g>
    <g>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" x1="191.182" y1="431.206" x2="190.904" y2="430.836"></line>
      <path fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" stroke-dasharray="1.0062,1.0062" d="
        M190.717,429.904l-6.892-19.001c0,0-2.42-5.585,9.126-5.027l18.16,0.094h25.427"></path>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" x1="237.004" y1="405.878" x2="237.47" y2="405.878"></line>
    </g>
  </g>
  <g>
    <rect x="212.043" y="404.945" fill="#403F2B" width="7.822" height="2.141"></rect>
    
      <text transform="matrix(1 0.0019 -0.0019 1 214.0576 406.4297)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">LANE 5</text>
  </g>
  <g>
    <g>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" x1="263.265" y1="406.435" x2="263.638" y2="406.435"></line>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" stroke-dasharray="1.0013,1.0013" x1="264.569" y1="406.435" x2="324.264" y2="406.435"></line>
    </g>
  </g>
  <g>
    <g>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" x1="323.242" y1="428.878" x2="322.775" y2="428.788"></line>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" stroke-dasharray="1.0023,1.0023" x1="321.846" y1="428.878" x2="273.789" y2="428.788"></line>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" x1="273.231" y1="428.878" x2="272.858" y2="428.878"></line>
    </g>
  </g>
  <g>
    <g>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" x1="247.341" y1="428.601" x2="246.781" y2="428.601"></line>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" stroke-dasharray="1.0023,1.0023" x1="245.944" y1="428.508" x2="197.888" y2="428.601"></line>
      
        <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" x1="197.422" y1="428.601" x2="196.957" y2="428.601"></line>
    </g>
  </g>
  <g>
    <rect x="284.964" y="404.945" fill="#403F2B" width="7.82" height="2.141"></rect>
    
      <text transform="matrix(1 0.0019 -0.0019 1 286.9717 406.4277)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">LANE 5</text>
  </g>
  <g>
    <rect x="290.925" y="427.522" fill="#403F2B" width="7.82" height="2.143"></rect>
    
      <text transform="matrix(1 0.0019 -0.0019 1 292.8887 429.0371)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">LANE 4</text>
  </g>
  <g>
    <rect x="276.397" y="450.022" fill="#403F2B" width="7.82" height="2.14"></rect>
    
      <text transform="matrix(1 0.0019 -0.0019 1 278.4419 451.5205)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">LANE 3</text>
  </g>
  <g>
    <rect x="212.79" y="427.204" fill="#403F2B" width="7.82" height="2.14"></rect>
    
      <text transform="matrix(1 0.0019 -0.0019 1 214.8208 428.626)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3365">LANE 4</text>
  </g>
  <text transform="matrix(1 0 0 1 205.6201 445.0684)" fill="#FFFFFF" font-family="'MyriadPro-Cond'" font-size="4.2691">SECTOR - B </text>
  <text transform="matrix(1 0 0 1 215.5684 458.4717)" fill="#FFFFFF" font-family="'MyriadPro-Cond'" font-size="4.2691">PARK</text>
  <g>
    
      <rect x="186.431" y="418.316" transform="matrix(0.9221 -0.3869 0.3869 0.9221 -148.7555 105.4254)" fill="#6F5E2A" width="2.143" height="7.821"></rect>
    
      <text transform="matrix(0.3868 0.9222 -0.9222 0.3868 186.043 420.0928)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="1.3367">STREET 6</text>
  </g>
  <g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.467,372.627c0.279-0.373,0.371-0.744,0.371-1.118c0-0.373-0.188-0.838-0.562-1.118
          c-0.089-0.092-0.089-0.092-0.188-0.187v-0.094c0-0.559-0.558-0.932-1.022-0.932c-0.089,0-0.089,0-0.188,0
          c-0.092-0.093-0.19-0.278-0.278-0.373c-0.279-0.277-0.651-0.372-1.121-0.372c-0.467,0-0.84,0.28-1.119,0.652
          c-0.092,0-0.279,0-0.465,0c-0.744,0-1.4,0.744-1.494,1.397h-0.188l0,0c0,0.093-0.093,0.185-0.188,0.278
          c-0.28,0.279-0.373,0.745-0.373,1.21c0,0.374,0.561,0.839,0.561,1.025l0,0c0,0.094,0.28,0.187,0.371,0.279v0.093l0,0l0,0l0,0
          v0.092c0,0.373,0.188,0.746,0.561,1.025c0.371,0.278,0.744,0.373,1.117,0.373c0.189,0,0.373-0.095,0.563-0.187
          c0.278,0.187,0.559,0.187,0.838,0.187c0.278,0,0.466-0.095,0.651-0.187c0.188,0.092,0.467,0.092,0.741,0.092
          c0.842,0,1.4-0.837,1.304-1.582C397.561,373.003,397.561,372.815,397.467,372.627z"></path>
        <path fill="#8CB347" d="M391.6,370.581L391.6,370.581L391.6,370.581z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.791,369.183L395.791,369.183c0-0.186-0.09-0.277-0.188-0.374c-0.279-0.277-0.65-0.371-1.119-0.371
          s-0.842,0.278-1.12,0.651c-0.093,0-0.28,0-0.466,0c-0.744,0-1.305,0.744-1.305,1.397c0,0,0,0-0.092,0l0,0
          c-0.091,0.092-0.188,0.185-0.279,0.278c-0.281,0.279-0.466,0.745-0.373,1.21c0,0.374,0.19,0.84,0.563,1.026l0,0
          c0.089,0.091,0.187,0.187,0.367,0.187l0,0l0,0l0,0l0,0v0.093c0,0.373,0.19,0.743,0.563,1.024
          c0.369,0.279,0.74,0.372,1.119,0.372c0.187,0,0.371,0,0.56-0.093c-0.651-0.185-1.117-0.745-1.305-1.396
          c-0.367-0.373-0.558-0.839-0.558-1.305c0-1.024,0.837-1.861,1.862-1.861c0.371-0.468,0.931-0.839,1.582-0.933
          C395.697,369.183,395.791,369.183,395.791,369.183z"></path>
        <path fill="#8CB347" d="M391.6,370.581L391.6,370.581L391.6,370.581z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.561,383.897c0.277-0.373,0.368-0.743,0.368-1.117c0-0.372-0.188-0.838-0.56-1.117
          c-0.088-0.094-0.088-0.094-0.187-0.188v-0.095c0-0.558-0.563-0.932-1.023-0.932c-0.094,0-0.094,0-0.188,0
          c-0.092-0.092-0.188-0.278-0.279-0.372c-0.281-0.279-0.651-0.373-1.121-0.373c-0.467,0-0.838,0.279-1.119,0.652
          c-0.092,0-0.279,0-0.467,0c-0.741,0-1.398,0.745-1.489,1.396h-0.188l0,0c0,0.094-0.092,0.188-0.188,0.281
          c-0.28,0.276-0.368,0.743-0.368,1.209c0,0.373,0.559,0.84,0.559,1.025l0,0c0,0.094,0.278,0.187,0.373,0.278v0.092l0,0l0,0l0,0
          v0.096c0,0.372,0.187,0.743,0.559,1.024c0.373,0.276,0.74,0.371,1.119,0.371c0.189,0,0.371-0.095,0.558-0.186
          c0.28,0.186,0.563,0.186,0.845,0.186c0.277,0,0.465-0.095,0.647-0.186c0.19,0.091,0.468,0.091,0.744,0.091
          c0.839,0,1.398-0.837,1.303-1.581C397.653,384.271,397.561,384.085,397.561,383.897z"></path>
        <path fill="#8CB347" d="M391.506,381.757L391.506,381.757L391.506,381.757z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.791,380.45L395.791,380.45c0-0.186-0.09-0.278-0.188-0.372c-0.279-0.279-0.65-0.373-1.119-0.373
          s-0.842,0.279-1.12,0.652c-0.093,0-0.28,0-0.466,0c-0.744,0-1.305,0.746-1.305,1.396c0,0,0,0-0.092,0l0,0
          c-0.091,0.093-0.188,0.188-0.279,0.281c-0.281,0.276-0.466,0.743-0.373,1.209c0,0.373,0.19,0.84,0.563,1.026l0,0
          c0.089,0.093,0.187,0.186,0.367,0.186l0,0l0,0l0,0l0,0v0.095c0,0.371,0.19,0.743,0.563,1.023
          c0.369,0.278,0.74,0.374,1.119,0.374c0.187,0,0.371,0,0.56-0.096c-0.651-0.186-1.117-0.743-1.305-1.396
          c-0.367-0.372-0.558-0.837-0.558-1.304c0-1.024,0.837-1.863,1.862-1.863c0.371-0.465,0.931-0.839,1.582-0.931
          C395.697,380.45,395.791,380.45,395.791,380.45z"></path>
        <path fill="#8CB347" d="M391.506,381.757L391.506,381.757L391.506,381.757z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.467,394.98c0.279-0.374,0.371-0.743,0.371-1.118c0-0.372-0.188-0.837-0.562-1.117
          c-0.089-0.093-0.089-0.093-0.188-0.188v-0.094c0-0.56-0.558-0.932-1.022-0.932c-0.089,0-0.089,0-0.188,0
          c-0.092-0.093-0.19-0.278-0.278-0.372c-0.279-0.279-0.651-0.373-1.121-0.373c-0.467,0-0.84,0.279-1.119,0.652
          c-0.092,0-0.279,0-0.465,0c-0.744,0-1.4,0.745-1.494,1.396h-0.188l0,0c0,0.093-0.093,0.188-0.188,0.28
          c-0.28,0.277-0.373,0.744-0.373,1.209c0,0.374,0.561,0.84,0.561,1.025l0,0c0,0.094,0.28,0.187,0.371,0.278v0.094l0,0l0,0l0,0
          v0.094c0,0.372,0.188,0.743,0.561,1.024c0.371,0.278,0.744,0.371,1.117,0.371c0.189,0,0.373-0.093,0.563-0.186
          c0.278,0.186,0.559,0.186,0.838,0.186c0.278,0,0.466-0.093,0.651-0.186c0.188,0.093,0.467,0.093,0.741,0.093
          c0.842,0,1.4-0.84,1.304-1.583C397.653,395.353,397.653,395.167,397.467,394.98z"></path>
        <path fill="#8CB347" d="M391.6,392.839L391.6,392.839L391.6,392.839z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.697,391.533L395.697,391.533c0-0.187-0.094-0.278-0.19-0.372c-0.278-0.279-0.649-0.373-1.118-0.373
          s-0.841,0.279-1.121,0.652c-0.091,0-0.279,0-0.466,0c-0.745,0-1.303,0.742-1.303,1.396c0,0,0,0-0.095,0l0,0
          c-0.088,0.093-0.186,0.188-0.278,0.28c-0.278,0.277-0.466,0.744-0.368,1.209c0,0.374,0.188,0.84,0.559,1.025l0,0
          c0.094,0.094,0.188,0.187,0.373,0.187l0,0l0,0l0,0l0,0v0.096c0,0.372,0.188,0.743,0.559,1.023
          c0.373,0.278,0.74,0.373,1.119,0.373c0.189,0,0.373,0,0.56-0.095c-0.647-0.186-1.116-0.744-1.301-1.397
          c-0.372-0.372-0.56-0.836-0.56-1.304c0-1.024,0.84-1.861,1.859-1.861c0.371-0.468,0.932-0.84,1.582-0.932
          C395.604,391.533,395.697,391.533,395.697,391.533z"></path>
        <path fill="#8CB347" d="M391.6,392.839L391.6,392.839L391.6,392.839z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.561,406.25c0.277-0.372,0.368-0.744,0.368-1.119c0-0.373-0.188-0.837-0.56-1.117
          c-0.088-0.092-0.088-0.092-0.187-0.187v-0.093c0-0.56-0.563-0.933-1.023-0.933c-0.094,0-0.094,0-0.188,0
          c-0.092-0.094-0.188-0.278-0.279-0.373c-0.281-0.278-0.651-0.372-1.121-0.372c-0.467,0-0.838,0.28-1.119,0.653
          c-0.092,0-0.279,0-0.467,0c-0.741,0-1.398,0.744-1.489,1.396h-0.188l0,0c0,0.092-0.092,0.187-0.188,0.278
          c-0.28,0.279-0.368,0.744-0.368,1.211c0,0.372,0.559,0.838,0.559,1.023l0,0c0,0.095,0.278,0.187,0.373,0.28v0.093l0,0l0,0l0,0
          v0.092c0,0.373,0.187,0.746,0.559,1.025c0.373,0.278,0.74,0.372,1.119,0.372c0.189,0,0.371-0.094,0.558-0.187
          c0.28,0.187,0.563,0.187,0.845,0.187c0.277,0,0.465-0.094,0.647-0.187c0.19,0.093,0.468,0.093,0.744,0.093
          c0.839,0,1.398-0.839,1.303-1.584C397.561,406.621,397.561,406.435,397.561,406.25z"></path>
        <path fill="#8CB347" d="M391.506,404.105L391.506,404.105L391.506,404.105z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.697,402.804L395.697,402.804c0-0.186-0.094-0.277-0.19-0.373c-0.278-0.278-0.649-0.371-1.118-0.371
          s-0.841,0.278-1.121,0.651c-0.091,0-0.279,0-0.466,0c-0.745,0-1.303,0.745-1.303,1.397c0,0,0,0-0.095,0l0,0
          c-0.088,0.095-0.186,0.187-0.278,0.278c-0.278,0.279-0.466,0.743-0.368,1.211c0,0.371,0.188,0.838,0.559,1.024l0,0
          c0.094,0.093,0.188,0.188,0.373,0.188l0,0l0,0l0,0l0,0v0.094c0,0.373,0.188,0.743,0.559,1.023
          c0.373,0.28,0.74,0.373,1.119,0.373c0.189,0,0.373,0,0.56-0.093c-0.647-0.188-1.116-0.746-1.301-1.397
          c-0.372-0.374-0.56-0.839-0.56-1.304c0-1.027,0.84-1.865,1.859-1.865c0.371-0.466,0.932-0.838,1.582-0.931
          C395.604,402.804,395.697,402.804,395.697,402.804z"></path>
        <path fill="#8CB347" d="M391.506,404.105L391.506,404.105L391.506,404.105z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.467,417.33c0.279-0.371,0.371-0.743,0.371-1.117c0-0.373-0.188-0.838-0.562-1.117
          c-0.089-0.094-0.089-0.094-0.188-0.187v-0.094c0-0.561-0.558-0.933-1.022-0.933c-0.089,0-0.089,0-0.188,0
          c-0.092-0.094-0.19-0.279-0.278-0.373c-0.279-0.278-0.651-0.371-1.121-0.371c-0.467,0-0.84,0.278-1.119,0.65
          c-0.092,0-0.279,0-0.465,0c-0.744,0-1.4,0.746-1.494,1.396h-0.188l0,0c0,0.093-0.093,0.188-0.188,0.28
          c-0.28,0.279-0.373,0.743-0.373,1.211c0,0.371,0.561,0.838,0.561,1.024l0,0c0,0.093,0.28,0.186,0.371,0.276v0.095l0,0l0,0l0,0
          v0.093c0,0.373,0.188,0.745,0.561,1.024c0.371,0.188,0.744,0.373,1.117,0.373c0.189,0,0.373-0.093,0.563-0.187
          c0.278,0.187,0.559,0.187,0.838,0.187c0.278,0,0.466-0.093,0.651-0.187c0.188,0.094,0.467,0.094,0.741,0.094
          c0.842,0,1.4-0.838,1.304-1.584C397.561,417.703,397.561,417.517,397.467,417.33z"></path>
        <path fill="#8CB347" d="M391.6,415.19L391.6,415.19L391.6,415.19z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.791,413.887L395.791,413.887c0-0.187-0.09-0.278-0.188-0.372c-0.279-0.279-0.65-0.372-1.119-0.372
          s-0.842,0.277-1.12,0.65c-0.093,0-0.28,0-0.466,0c-0.744,0-1.305,0.746-1.305,1.397c0,0,0,0-0.092,0l0,0
          c-0.091,0.092-0.188,0.186-0.279,0.279c-0.281,0.278-0.466,0.742-0.373,1.21c0,0.371,0.19,0.839,0.563,1.024l0,0
          c0.089,0.094,0.187,0.188,0.367,0.188l0,0l0,0l0,0l0,0v0.094c0,0.374,0.19,0.743,0.563,1.023c0.369,0.28,0.74,0.374,1.119,0.374
          c0.187,0,0.371,0,0.56-0.094c-0.651-0.187-1.117-0.745-1.305-1.397c-0.367-0.373-0.558-0.837-0.558-1.305
          c0-1.024,0.837-1.86,1.862-1.86c0.371-0.468,0.931-0.841,1.582-0.935C395.697,413.887,395.791,413.887,395.791,413.887z"></path>
        <path fill="#8CB347" d="M391.6,415.19L391.6,415.19L391.6,415.19z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.561,428.601c0.277-0.372,0.368-0.747,0.368-1.118c0-0.374-0.188-0.84-0.56-1.122
          c-0.088-0.091-0.088-0.091-0.187-0.187v-0.094c0-0.562-0.563-0.931-1.023-0.931c-0.094,0-0.094,0-0.188,0
          c-0.092-0.092-0.188-0.281-0.279-0.369c-0.281-0.28-0.651-0.373-1.121-0.373c-0.467,0-0.838,0.28-1.119,0.65
          c-0.092,0-0.279,0-0.467,0c-0.741,0-1.398,0.741-1.489,1.398h-0.188l0,0c0,0.093-0.092,0.188-0.188,0.28
          c-0.28,0.277-0.368,0.744-0.368,1.21c0,0.373,0.559,0.838,0.559,1.025l0,0c0,0.091,0.278,0.186,0.373,0.278v0.092l0,0l0,0l0,0
          v0.091c0,0.371,0.187,0.744,0.559,1.021c0.373,0.28,0.74,0.37,1.119,0.37c0.189,0,0.371-0.09,0.558-0.188
          c0.28,0.188,0.563,0.188,0.845,0.188c0.277,0,0.465-0.09,0.647-0.188c0.19,0.092,0.468,0.092,0.744,0.092
          c0.839,0,1.398-0.837,1.303-1.582C397.653,428.974,397.561,428.788,397.561,428.601z"></path>
        <path fill="#8CB347" d="M391.506,426.457L391.506,426.457L391.506,426.457z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.791,425.154L395.791,425.154c0-0.188-0.09-0.278-0.188-0.371c-0.279-0.281-0.65-0.374-1.119-0.374
          s-0.842,0.284-1.12,0.65c-0.093,0-0.28,0-0.466,0c-0.744,0-1.305,0.745-1.305,1.4c0,0,0,0-0.092,0l0,0
          c-0.091,0.094-0.188,0.192-0.279,0.28c-0.281,0.282-0.466,0.743-0.373,1.212c0,0.371,0.19,0.843,0.563,1.023l0,0
          c0.089,0.089,0.187,0.188,0.367,0.188l0,0l0,0l0,0l0,0v0.092c0,0.371,0.19,0.742,0.563,1.021
          c0.369,0.277,0.74,0.373,1.119,0.373c0.187,0,0.371,0,0.56-0.096c-0.651-0.186-1.117-0.741-1.305-1.396
          c-0.367-0.37-0.558-0.838-0.558-1.306c0-1.02,0.837-1.86,1.862-1.86c0.371-0.467,0.931-0.836,1.582-0.933
          C395.697,425.154,395.791,425.154,395.791,425.154z"></path>
        <path fill="#8CB347" d="M391.506,426.457L391.506,426.457L391.506,426.457z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.467,439.683c0.279-0.373,0.371-0.743,0.371-1.117c0-0.371-0.188-0.838-0.562-1.121
          c-0.089-0.089-0.089-0.089-0.188-0.187v-0.095c0-0.56-0.558-0.932-1.022-0.932c-0.089,0-0.089,0-0.188,0
          c-0.092-0.09-0.19-0.278-0.278-0.366c-0.279-0.28-0.651-0.373-1.121-0.373c-0.467,0-0.84,0.276-1.119,0.649
          c-0.092,0-0.279,0-0.465,0c-0.744,0-1.4,0.742-1.494,1.397h-0.188l0,0c0,0.093-0.093,0.189-0.188,0.28
          c-0.28,0.279-0.373,0.743-0.373,1.211c0,0.374,0.561,0.839,0.561,1.023l0,0c0,0.093,0.28,0.187,0.371,0.28v0.09l0,0l0,0l0,0
          v0.096c0,0.366,0.188,0.74,0.561,1.021c0.371,0.188,0.744,0.37,1.117,0.37c0.189,0,0.373-0.09,0.563-0.188
          c0.278,0.188,0.559,0.188,0.838,0.188c0.278,0,0.466-0.09,0.651-0.188c0.188,0.094,0.467,0.094,0.741,0.094
          c0.842,0,1.4-0.84,1.304-1.585C397.653,440.056,397.653,439.87,397.467,439.683z"></path>
        <path fill="#8CB347" d="M391.6,437.633L391.6,437.633L391.6,437.633z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.697,436.236L395.697,436.236c0-0.188-0.094-0.278-0.19-0.371c-0.278-0.28-0.649-0.373-1.118-0.373
          s-0.841,0.282-1.121,0.649c-0.091,0-0.279,0-0.466,0c-0.745,0-1.303,0.746-1.303,1.4c0,0,0,0-0.095,0l0,0
          c-0.088,0.092-0.186,0.188-0.278,0.278c-0.278,0.279-0.466,0.745-0.368,1.212c0,0.373,0.188,0.84,0.559,1.023l0,0
          c0.094,0.092,0.188,0.186,0.373,0.186l0,0l0,0l0,0l0,0v0.096c0,0.368,0.188,0.741,0.559,1.021
          c0.373,0.277,0.74,0.374,1.119,0.374c0.189,0,0.373,0,0.56-0.097c-0.647-0.188-1.116-0.742-1.301-1.398
          c-0.372-0.368-0.56-0.838-0.56-1.3c0-1.025,0.84-1.864,1.859-1.864c0.371-0.467,0.932-0.842,1.582-0.933
          C395.604,436.236,395.697,436.236,395.697,436.236z"></path>
        <path fill="#8CB347" d="M391.6,437.633L391.6,437.633L391.6,437.633z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.561,450.952c0.277-0.372,0.368-0.741,0.368-1.118s-0.188-0.841-0.56-1.119
          c-0.088-0.093-0.088-0.093-0.187-0.19v-0.087c0-0.559-0.563-0.932-1.023-0.932c-0.094,0-0.094,0-0.188,0
          c-0.092-0.093-0.188-0.28-0.279-0.373c-0.281-0.28-0.651-0.374-1.121-0.374c-0.467,0-0.838,0.281-1.119,0.654
          c-0.092,0-0.279,0-0.467,0c-0.741,0-1.398,0.744-1.489,1.398h-0.188l0,0c0,0.091-0.092,0.187-0.188,0.278
          c-0.28,0.28-0.368,0.743-0.368,1.212c0,0.372,0.559,0.842,0.559,1.021l0,0c0,0.096,0.278,0.19,0.373,0.28v0.093l0,0l0,0l0,0
          v0.093c0,0.373,0.187,0.742,0.559,1.021c0.373,0.283,0.74,0.371,1.119,0.371c0.189,0,0.371-0.088,0.558-0.188
          c0.28,0.188,0.563,0.188,0.845,0.188c0.277,0,0.465-0.088,0.647-0.188c0.19,0.092,0.468,0.092,0.744,0.092
          c0.839,0,1.398-0.841,1.303-1.581C397.561,451.323,397.561,451.139,397.561,450.952z"></path>
        <path fill="#8CB347" d="M391.506,448.811L391.506,448.811L391.506,448.811z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.697,447.506L395.697,447.506c0-0.191-0.094-0.28-0.19-0.373c-0.278-0.279-0.649-0.37-1.118-0.37
          s-0.841,0.277-1.121,0.65c-0.091,0-0.279,0-0.466,0c-0.745,0-1.303,0.744-1.303,1.399c0,0,0,0-0.095,0l0,0
          c-0.088,0.09-0.186,0.186-0.278,0.277c-0.278,0.28-0.466,0.743-0.368,1.212c0,0.372,0.188,0.841,0.559,1.021l0,0
          c0.094,0.096,0.188,0.19,0.373,0.19l0,0l0,0l0,0l0,0v0.093c0,0.369,0.188,0.743,0.559,1.021c0.373,0.281,0.74,0.373,1.119,0.373
          c0.189,0,0.373,0,0.56-0.092c-0.647-0.188-1.116-0.744-1.301-1.397c-0.372-0.372-0.56-0.842-0.56-1.304
          c0-1.024,0.84-1.863,1.859-1.863c0.371-0.465,0.932-0.838,1.582-0.931C395.604,447.506,395.697,447.506,395.697,447.506z"></path>
        <path fill="#8CB347" d="M391.506,448.811L391.506,448.811L391.506,448.811z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.467,462.034c0.279-0.374,0.371-0.741,0.371-1.119c0-0.373-0.188-0.839-0.562-1.121
          c-0.089-0.09-0.089-0.09-0.188-0.188v-0.093c0-0.56-0.558-0.932-1.022-0.932c-0.089,0-0.089,0-0.188,0
          c-0.092-0.089-0.19-0.279-0.278-0.369c-0.279-0.279-0.651-0.371-1.121-0.371c-0.467,0-0.84,0.279-1.119,0.651
          c-0.092,0-0.279,0-0.465,0c-0.744,0-1.4,0.74-1.494,1.397h-0.188l0,0c0,0.092-0.093,0.188-0.188,0.279
          c-0.28,0.279-0.373,0.743-0.373,1.211c0,0.372,0.561,0.842,0.561,1.024l0,0c0,0.092,0.28,0.185,0.371,0.278v0.093l0,0l0,0l0,0
          v0.093c0,0.368,0.188,0.74,0.561,1.021c0.371,0.279,0.744,0.372,1.117,0.372c0.189,0,0.373-0.093,0.563-0.188
          c0.278,0.188,0.559,0.188,0.838,0.188c0.278,0,0.466-0.093,0.651-0.188c0.188,0.091,0.467,0.091,0.741,0.091
          c0.842,0,1.4-0.837,1.304-1.583C397.561,462.407,397.561,462.221,397.467,462.034z"></path>
        <path fill="#8CB347" d="M391.506,459.984L391.506,459.984L391.506,459.984z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.791,458.681L395.791,458.681c0-0.187-0.09-0.277-0.188-0.372c-0.279-0.277-0.65-0.367-1.119-0.367
          s-0.842,0.278-1.12,0.646c-0.093,0-0.28,0-0.466,0c-0.744,0-1.305,0.744-1.305,1.4c0,0,0,0-0.092,0l0,0
          c-0.091,0.095-0.188,0.188-0.279,0.28c-0.281,0.28-0.466,0.744-0.373,1.213c0,0.369,0.19,0.837,0.563,1.021l0,0
          c0.089,0.088,0.187,0.188,0.367,0.188l0,0l0,0l0,0l0,0v0.092c0,0.373,0.19,0.74,0.563,1.023c0.369,0.28,0.74,0.368,1.119,0.368
          c0.187,0,0.371,0,0.56-0.088c-0.651-0.191-1.117-0.744-1.305-1.401c-0.367-0.374-0.558-0.84-0.558-1.304
          c0-1.021,0.837-1.863,1.862-1.863c0.371-0.466,0.931-0.839,1.582-0.928C395.697,458.588,395.791,458.681,395.791,458.681z"></path>
        <path fill="#8CB347" d="M391.506,459.984L391.506,459.984L391.506,459.984z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.561,473.304c0.277-0.374,0.368-0.744,0.368-1.123c0-0.378-0.188-0.839-0.56-1.118
          c-0.088-0.092-0.088-0.092-0.187-0.189v-0.089c0-0.563-0.563-0.933-1.023-0.933c-0.094,0-0.094,0-0.188,0
          c-0.092-0.093-0.188-0.278-0.279-0.373c-0.281-0.278-0.651-0.369-1.121-0.369c-0.467,0-0.838,0.278-1.119,0.649
          c-0.092,0-0.279,0-0.467,0c-0.741,0-1.398,0.745-1.489,1.401h-0.188l0,0c0,0.088-0.092,0.185-0.188,0.279
          c-0.28,0.278-0.368,0.739-0.368,1.21c0,0.368,0.559,0.84,0.559,1.021l0,0c0,0.094,0.278,0.19,0.373,0.28v0.093l0,0l0,0l0,0
          v0.092c0,0.372,0.187,0.741,0.559,1.022c0.373,0.28,0.74,0.37,1.119,0.37c0.189,0,0.371-0.09,0.558-0.188
          c0.28,0.188,0.563,0.188,0.845,0.188c0.277,0,0.465-0.09,0.647-0.188c0.19,0.089,0.468,0.089,0.744,0.089
          c0.839,0,1.398-0.838,1.303-1.58C397.653,473.676,397.561,473.49,397.561,473.304z"></path>
        <path fill="#8CB347" d="M391.506,471.161L391.506,471.161L391.506,471.161z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.791,469.856L395.791,469.856c0-0.189-0.09-0.279-0.188-0.371c-0.279-0.28-0.65-0.372-1.119-0.372
          s-0.842,0.278-1.12,0.651c-0.093,0-0.28,0-0.466,0c-0.744,0-1.305,0.743-1.305,1.4c0,0,0,0-0.092,0l0,0
          c-0.091,0.09-0.188,0.187-0.279,0.279c-0.281,0.278-0.466,0.74-0.373,1.211c0,0.373,0.19,0.839,0.563,1.021l0,0
          c0.089,0.093,0.187,0.189,0.367,0.189l0,0l0,0l0,0l0,0v0.095c0,0.367,0.19,0.74,0.563,1.02c0.369,0.279,0.74,0.372,1.119,0.372
          c0.187,0,0.371,0,0.56-0.093c-0.651-0.187-1.117-0.741-1.305-1.397c-0.367-0.371-0.558-0.838-0.558-1.303
          c0-1.024,0.837-1.861,1.862-1.861c0.371-0.467,0.931-0.842,1.582-0.933C395.697,469.856,395.791,469.856,395.791,469.856z"></path>
        <path fill="#8CB347" d="M391.506,471.161L391.506,471.161L391.506,471.161z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.467,484.386c0.279-0.373,0.371-0.745,0.371-1.122s-0.188-0.84-0.562-1.119
          c-0.089-0.092-0.089-0.092-0.188-0.189v-0.089c0-0.563-0.558-0.932-1.022-0.932c-0.089,0-0.089,0-0.188,0
          c-0.092-0.091-0.19-0.278-0.278-0.374c-0.279-0.277-0.651-0.368-1.121-0.368c-0.467,0-0.84,0.277-1.119,0.651
          c-0.092,0-0.279,0-0.465,0c-0.744,0-1.4,0.743-1.494,1.396h-0.188l0,0c0,0.092-0.093,0.188-0.188,0.282
          c-0.28,0.278-0.373,0.74-0.373,1.211c0,0.367,0.561,0.839,0.561,1.021l0,0c0,0.094,0.28,0.19,0.371,0.279v0.093l0,0l0,0l0,0
          v0.094c0,0.369,0.188,0.74,0.561,1.021c0.371,0.281,0.744,0.372,1.117,0.372c0.189,0,0.373-0.091,0.563-0.188
          c0.278,0.188,0.559,0.188,0.838,0.188c0.278,0,0.466-0.091,0.651-0.188c0.188,0.089,0.467,0.089,0.741,0.089
          c0.842,0,1.4-0.838,1.304-1.581C397.653,484.758,397.653,484.572,397.467,484.386z"></path>
        <path fill="#8CB347" d="M391.6,482.337L391.6,482.337L391.6,482.337z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.697,481.032L395.697,481.032c0-0.187-0.094-0.279-0.19-0.368c-0.278-0.278-0.649-0.373-1.118-0.373
          s-0.841,0.279-1.121,0.652c-0.091,0-0.279,0-0.466,0c-0.745,0-1.303,0.74-1.303,1.397c0,0,0,0-0.095,0l0,0
          c-0.088,0.093-0.186,0.19-0.278,0.279c-0.278,0.282-0.466,0.744-0.368,1.211c0,0.372,0.188,0.841,0.559,1.023l0,0
          c0.094,0.092,0.188,0.19,0.373,0.19l0,0l0,0l0,0l0,0v0.088c0,0.372,0.188,0.744,0.559,1.024c0.373,0.278,0.74,0.372,1.119,0.372
          c0.189,0,0.373,0,0.56-0.093c-0.647-0.188-1.116-0.743-1.301-1.399c-0.372-0.371-0.56-0.841-0.56-1.302
          c0-1.022,0.84-1.862,1.859-1.862c0.371-0.468,0.932-0.841,1.582-0.932C395.604,480.94,395.697,481.032,395.697,481.032z"></path>
        <path fill="#8CB347" d="M391.6,482.337L391.6,482.337L391.6,482.337z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.561,495.654c0.277-0.372,0.368-0.743,0.368-1.117c0-0.376-0.188-0.844-0.56-1.123
          c-0.088-0.092-0.088-0.092-0.187-0.188v-0.092c0-0.561-0.563-0.931-1.023-0.931c-0.094,0-0.094,0-0.188,0
          c-0.092-0.095-0.188-0.28-0.279-0.373c-0.281-0.279-0.651-0.372-1.121-0.372c-0.467,0-0.838,0.282-1.119,0.65
          c-0.092,0-0.279,0-0.467,0c-0.741,0-1.398,0.744-1.489,1.399h-0.188l0,0c0,0.092-0.092,0.188-0.188,0.279
          c-0.28,0.28-0.368,0.743-0.368,1.211c0,0.373,0.559,0.841,0.559,1.024l0,0c0,0.089,0.278,0.188,0.373,0.279v0.088l0,0l0,0l0,0
          v0.094c0,0.371,0.187,0.744,0.559,1.022c0.373,0.279,0.74,0.371,1.119,0.371c0.189,0,0.371-0.092,0.558-0.188
          c0.28,0.188,0.563,0.188,0.845,0.188c0.277,0,0.465-0.092,0.647-0.188c0.19,0.092,0.468,0.092,0.744,0.092
          c0.839,0,1.398-0.84,1.303-1.581C397.561,495.934,397.653,495.747,397.561,495.654z"></path>
        <path fill="#8CB347" d="M391.506,493.513L391.506,493.513L391.506,493.513z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.697,492.209L395.697,492.209c0-0.188-0.094-0.281-0.19-0.374c-0.278-0.278-0.649-0.367-1.118-0.367
          s-0.841,0.279-1.121,0.647c-0.091,0-0.279,0-0.466,0c-0.745,0-1.303,0.744-1.303,1.4c0,0,0,0-0.095,0l0,0
          c-0.088,0.093-0.186,0.188-0.278,0.279c-0.278,0.28-0.466,0.744-0.368,1.211c0,0.372,0.188,0.839,0.559,1.023l0,0
          c0.094,0.089,0.188,0.187,0.373,0.187l0,0l0,0l0,0l0,0v0.094c0,0.372,0.188,0.74,0.559,1.021
          c0.373,0.283,0.74,0.373,1.119,0.373c0.189,0,0.373,0,0.56-0.09c-0.647-0.189-1.116-0.745-1.301-1.4
          c-0.372-0.371-0.56-0.839-0.56-1.303c0-1.022,0.84-1.863,1.859-1.863c0.371-0.465,0.932-0.838,1.582-0.932
          C395.604,492.209,395.697,492.209,395.697,492.209z"></path>
        <path fill="#8CB347" d="M391.506,493.513L391.506,493.513L391.506,493.513z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.467,506.736c0.279-0.372,0.371-0.743,0.371-1.121c0-0.372-0.188-0.838-0.562-1.117
          c-0.089-0.093-0.089-0.093-0.188-0.188v-0.093c0-0.559-0.558-0.93-1.022-0.93c-0.089,0-0.089,0-0.188,0
          c-0.092-0.093-0.19-0.28-0.278-0.373c-0.279-0.279-0.651-0.372-1.121-0.372c-0.467,0-0.84,0.284-1.119,0.652
          c-0.092,0-0.279,0-0.465,0c-0.744,0-1.4,0.743-1.494,1.399h-0.188l0,0c0,0.089-0.093,0.188-0.188,0.28
          c-0.28,0.277-0.373,0.74-0.373,1.209c0,0.374,0.561,0.841,0.561,1.024l0,0c0,0.09,0.28,0.188,0.371,0.279v0.089l0,0l0,0l0,0
          v0.095c0,0.371,0.188,0.743,0.561,1.021c0.371,0.279,0.744,0.372,1.117,0.372c0.189,0,0.373-0.093,0.563-0.188
          c0.278,0.188,0.559,0.188,0.838,0.188c0.278,0,0.466-0.093,0.651-0.188c0.188,0.091,0.467,0.091,0.741,0.091
          c0.842,0,1.4-0.84,1.304-1.582C397.561,507.11,397.561,506.924,397.467,506.736z"></path>
        <path fill="#8CB347" d="M391.506,504.688L391.506,504.688L391.506,504.688z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.791,503.384L395.791,503.384c0-0.188-0.09-0.278-0.188-0.372c-0.279-0.278-0.65-0.372-1.119-0.372
          s-0.842,0.279-1.12,0.652c-0.093,0-0.28,0-0.466,0c-0.744,0-1.305,0.743-1.305,1.396c0,0,0,0-0.092,0l0,0
          c-0.091,0.095-0.188,0.191-0.279,0.283c-0.281,0.28-0.466,0.741-0.373,1.21c0,0.37,0.19,0.839,0.563,1.022l0,0
          c0.089,0.092,0.187,0.188,0.367,0.188l0,0l0,0l0,0l0,0v0.091c0,0.371,0.19,0.743,0.563,1.023
          c0.369,0.279,0.74,0.371,1.119,0.371c0.187,0,0.371,0,0.56-0.092c-0.651-0.188-1.117-0.741-1.305-1.398
          c-0.367-0.373-0.558-0.842-0.558-1.305c0-1.021,0.837-1.86,1.862-1.86c0.371-0.468,0.931-0.84,1.582-0.932
          C395.697,503.384,395.791,503.384,395.791,503.384z"></path>
        <path fill="#8CB347" d="M391.506,504.688L391.506,504.688L391.506,504.688z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.561,518.006c0.277-0.373,0.368-0.741,0.368-1.119c0-0.379-0.188-0.843-0.56-1.121
          c-0.088-0.09-0.088-0.09-0.187-0.188v-0.091c0-0.561-0.563-0.933-1.023-0.933c-0.094,0-0.094,0-0.188,0
          c-0.092-0.09-0.188-0.278-0.279-0.37c-0.281-0.281-0.651-0.37-1.121-0.37c-0.467,0-0.838,0.278-1.119,0.65
          c-0.092,0-0.279,0-0.467,0c-0.741,0-1.398,0.742-1.489,1.398h-0.188l0,0c0,0.092-0.092,0.187-0.188,0.279
          c-0.28,0.278-0.368,0.743-0.368,1.211c0,0.371,0.559,0.843,0.559,1.021l0,0c0,0.094,0.278,0.188,0.373,0.281v0.092l0,0l0,0l0,0
          v0.089c0,0.373,0.187,0.746,0.559,1.025c0.373,0.278,0.74,0.371,1.119,0.371c0.189,0,0.371-0.093,0.558-0.189
          c0.28,0.189,0.563,0.189,0.845,0.189c0.277,0,0.465-0.093,0.647-0.189c0.19,0.093,0.468,0.093,0.744,0.093
          c0.839,0,1.398-0.841,1.303-1.584C397.653,518.285,397.653,518.098,397.561,518.006z"></path>
        <path fill="#8CB347" d="M391.506,515.864L391.506,515.864L391.506,515.864z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.791,514.466L395.791,514.466c0-0.188-0.09-0.278-0.188-0.372c-0.279-0.277-0.65-0.371-1.119-0.371
          s-0.842,0.278-1.12,0.65c-0.093,0-0.28,0-0.466,0c-0.744,0-1.305,0.741-1.305,1.398c0,0,0,0-0.092,0l0,0
          c-0.091,0.094-0.188,0.189-0.279,0.277c-0.281,0.285-0.466,0.747-0.373,1.216c0,0.368,0.19,0.837,0.563,1.021l0,0
          c0.089,0.091,0.187,0.19,0.367,0.19l0,0l0,0l0,0l0,0v0.089c0,0.372,0.19,0.743,0.563,1.023c0.369,0.279,0.74,0.371,1.119,0.371
          c0.187,0,0.371,0,0.56-0.092c-0.651-0.188-1.117-0.74-1.305-1.397c-0.367-0.374-0.558-0.843-0.558-1.305
          c0-1.021,0.837-1.862,1.862-1.862c0.371-0.468,0.931-0.839,1.582-0.93C395.697,514.56,395.791,514.466,395.791,514.466z"></path>
        <path fill="#8CB347" d="M391.506,515.864L391.506,515.864L391.506,515.864z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M397.467,529.089c0.279-0.374,0.371-0.742,0.371-1.12s-0.188-0.842-0.562-1.121
          c-0.089-0.09-0.089-0.09-0.188-0.188v-0.091c0-0.559-0.558-0.933-1.022-0.933c-0.089,0-0.089,0-0.188,0
          c-0.092-0.089-0.19-0.277-0.278-0.373c-0.279-0.278-0.651-0.366-1.121-0.366c-0.467,0-0.84,0.278-1.119,0.651
          c-0.092,0-0.279,0-0.465,0c-0.744,0-1.4,0.74-1.494,1.397h-0.188l0,0c0,0.091-0.093,0.186-0.188,0.278
          c-0.28,0.279-0.373,0.743-0.373,1.211c0,0.371,0.561,0.843,0.561,1.021l0,0c0,0.095,0.28,0.188,0.371,0.28v0.094l0,0l0,0l0,0
          v0.088c0,0.373,0.188,0.745,0.561,1.025c0.371,0.187,0.744,0.372,1.117,0.372c0.189,0,0.373-0.094,0.563-0.19
          c0.278,0.19,0.559,0.19,0.838,0.19c0.278,0,0.466-0.094,0.651-0.19c0.188,0.093,0.467,0.093,0.741,0.093
          c0.842,0,1.4-0.841,1.304-1.584C397.653,529.554,397.653,529.367,397.467,529.089z"></path>
        <path fill="#8CB347" d="M391.6,527.039L391.6,527.039L391.6,527.039z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M395.697,525.736L395.697,525.736c0-0.188-0.094-0.28-0.19-0.372c-0.278-0.279-0.649-0.373-1.118-0.373
          s-0.841,0.283-1.121,0.65c-0.091,0-0.279,0-0.466,0c-0.745,0-1.303,0.744-1.303,1.401c0,0,0,0-0.095,0l0,0
          c-0.088,0.089-0.186,0.188-0.278,0.279c-0.278,0.278-0.466,0.741-0.368,1.211c0,0.372,0.188,0.84,0.559,1.023l0,0
          c0.094,0.09,0.188,0.188,0.373,0.188l0,0l0,0l0,0l0,0v0.091c0,0.372,0.188,0.74,0.559,1.021c0.373,0.278,0.74,0.37,1.119,0.37
          c0.189,0,0.373,0,0.56-0.092c-0.647-0.188-1.116-0.741-1.301-1.396c-0.372-0.372-0.56-0.84-0.56-1.305
          c0-1.02,0.84-1.862,1.859-1.862c0.371-0.465,0.932-0.838,1.582-0.933C395.604,525.736,395.697,525.736,395.697,525.736z"></path>
        <path fill="#8CB347" d="M391.6,527.039L391.6,527.039L391.6,527.039z"></path>
      </g>
    </g>
  </g>
  <g>
    <g>
      <g>
        <path fill="#8CB347" d="M326.967,463.803c-0.089,0.19-0.188,0.372-0.188,0.563c0.094,0.188,0.094,0.37,0.279,0.466l0.094,0.094
          c0,0,0,0,0,0.092c0,0.279,0.279,0.369,0.466,0.369h0.092c0,0.093,0.093,0.093,0.093,0.188c0.187,0.091,0.279,0.188,0.465,0.188
          c0.187,0,0.371-0.092,0.467-0.278c0.092,0,0.092,0,0.188,0c0.371,0,0.649-0.373,0.649-0.652h0.092l0,0c0,0,0-0.089,0.091-0.089
          c0.095-0.189,0.191-0.283,0.191-0.467c0-0.188-0.191-0.466-0.191-0.466l0,0c0,0-0.091,0-0.188-0.093v0.093l0,0v-0.093v-0.092
          v-0.091c0-0.188-0.09-0.371-0.277-0.468c-0.191-0.092-0.283-0.186-0.563-0.186c-0.09,0-0.188,0-0.278,0.088
          c-0.091-0.088-0.28-0.088-0.371-0.088c-0.093,0-0.188,0-0.28,0.088c-0.092,0-0.188-0.088-0.371-0.088
          c-0.371,0-0.65,0.367-0.65,0.74C326.875,463.617,326.875,463.711,326.967,463.803z"></path>
        <path fill="#8CB347" d="M329.669,464.828L329.669,464.828L329.669,464.828z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M327.805,465.388C327.805,465.479,327.805,465.479,327.805,465.388c0,0.093,0,0.093,0.09,0.188
          c0.189,0.091,0.279,0.188,0.467,0.188s0.369-0.09,0.467-0.278c0.092,0,0.092,0,0.189,0c0.369,0,0.56-0.373,0.56-0.741l0,0l0,0
          c0.093,0,0.093-0.094,0.093-0.094c0.09-0.189,0.188-0.372,0.188-0.56c0-0.189-0.092-0.373-0.279-0.467l0,0
          c-0.092,0-0.092-0.092-0.189-0.092l0,0l0,0l0,0l0,0c0,0,0,0,0-0.091c0-0.189-0.091-0.373-0.279-0.468
          c-0.188-0.092-0.279-0.188-0.56-0.188c-0.093,0-0.188,0-0.278,0.095c0.278,0.088,0.559,0.367,0.559,0.647
          c0.189,0.188,0.279,0.372,0.279,0.65c0,0.468-0.369,0.843-0.838,0.843C328.456,465.388,328.271,465.479,327.805,465.388
          C327.898,465.388,327.805,465.388,327.805,465.388z"></path>
        <path fill="#8CB347" d="M329.669,464.828L329.669,464.828L329.669,464.828z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M326.967,468.832c-0.089,0.19-0.188,0.372-0.188,0.56c0,0.19,0.094,0.373,0.279,0.468l0.094,0.093
          c0,0,0,0,0,0.09c0,0.279,0.279,0.37,0.466,0.37h0.092c0,0.094,0.093,0.094,0.093,0.188c0.187,0.094,0.279,0.189,0.465,0.189
          c0.187,0,0.371-0.091,0.467-0.279c0.092,0,0.092,0,0.188,0c0.371,0,0.649-0.372,0.649-0.65h0.092l0,0c0,0,0-0.093,0.091-0.093
          c0.095-0.187,0.191-0.465,0.191-0.651c0-0.186-0.191-0.56-0.191-0.56l0,0c0,0-0.091,0-0.188-0.094v0.094l0,0v0.094l0,0l0,0
          c0-0.19-0.09-0.372-0.277-0.469c-0.191-0.09-0.283-0.188-0.563-0.188c-0.09,0-0.188,0-0.278,0.093
          c-0.091-0.093-0.28-0.093-0.371-0.093c-0.093,0-0.188,0-0.28,0.093c-0.092,0-0.188-0.093-0.371-0.093
          c-0.371,0-0.65,0.371-0.65,0.741C326.967,468.647,326.875,468.739,326.967,468.832z"></path>
        <path fill="#8CB347" d="M329.761,469.856L329.761,469.856L329.761,469.856z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M327.805,470.417L327.805,470.417c0,0.092,0,0.092,0.09,0.187c0.189,0.095,0.279,0.19,0.467,0.19
          s0.369-0.092,0.467-0.279c0.092,0,0.092,0,0.189,0c0.369,0,0.56-0.373,0.56-0.743l0,0l0,0c0.093,0,0.093-0.093,0.093-0.093
          c0.09-0.188,0.188-0.369,0.188-0.561c-0.092-0.188-0.092-0.368-0.279-0.465l0,0c-0.092,0-0.092-0.094-0.189-0.094l0,0l0,0l0,0
          l0,0c0,0,0,0,0-0.093c0-0.188-0.091-0.369-0.279-0.466c-0.188-0.092-0.279-0.187-0.56-0.187c-0.093,0-0.188,0-0.278,0.089
          c0.278,0.093,0.559,0.372,0.559,0.651c0.189,0.188,0.279,0.372,0.279,0.651c0,0.465-0.369,0.84-0.838,0.84
          C328.456,470.323,328.271,470.509,327.805,470.417C327.898,470.417,327.805,470.417,327.805,470.417z"></path>
        <path fill="#8CB347" d="M329.761,469.856L329.761,469.856L329.761,469.856z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M327.061,473.861c-0.093,0.188-0.186,0.372-0.186,0.56c0,0.188,0.088,0.372,0.277,0.465l0.09,0.095
          c0,0,0,0,0,0.093c0,0.278,0.279,0.371,0.468,0.371h0.092c0,0.09,0.091,0.09,0.091,0.188c0.189,0.091,0.278,0.187,0.467,0.187
          c0.188,0,0.371-0.091,0.467-0.279c0.092,0,0.092,0,0.189,0c0.368,0,0.648-0.368,0.648-0.652h0.091l0,0c0,0,0-0.089,0.095-0.089
          c0.09-0.188,0.187-0.651,0.187-0.838c0-0.19-0.187-0.745-0.187-0.745l0,0c0,0-0.095,0-0.189-0.092v0.092l0,0c0,0,0,0.28,0,0.188
          v0.093l0,0c0-0.188-0.092-0.372-0.281-0.465c-0.186-0.096-0.279-0.191-0.559-0.191c-0.09,0-0.188,0-0.279,0.092
          c-0.092-0.092-0.279-0.092-0.372-0.092c-0.091,0-0.188,0-0.278,0.092c-0.092,0-0.188-0.092-0.373-0.092
          c-0.371,0-0.649,0.372-0.649,0.744C326.967,473.676,326.967,473.769,327.061,473.861z"></path>
        <path fill="#8CB347" d="M329.669,474.886L329.669,474.886L329.669,474.886z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M327.712,475.444L327.712,475.444c0,0.091,0,0.091,0.093,0.188c0.188,0.091,0.279,0.187,0.467,0.187
          c0.185,0,0.369-0.09,0.465-0.278c0.092,0,0.092,0,0.189,0c0.37,0,0.559-0.369,0.559-0.742l0,0l0,0
          c0.093,0,0.093-0.092,0.093-0.092c0.091-0.188,0.188-0.372,0.188-0.561s-0.091-0.371-0.279-0.466l0,0
          c-0.094,0-0.094-0.091-0.188-0.091l0,0l0,0l0,0l0,0c0,0,0,0,0-0.092c0-0.188-0.091-0.372-0.278-0.467
          c-0.189-0.094-0.281-0.188-0.563-0.188c-0.09,0-0.188,0-0.279,0.091c0.279,0.094,0.561,0.373,0.561,0.652
          c0.189,0.188,0.281,0.369,0.281,0.652c0,0.465-0.373,0.839-0.842,0.839C328.456,475.258,328.177,475.444,327.712,475.444
          C327.805,475.538,327.712,475.444,327.712,475.444z"></path>
        <path fill="#8CB347" d="M329.669,474.886L329.669,474.886L329.669,474.886z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M326.967,478.798c-0.089,0.188-0.188,0.367-0.188,0.56c0.094,0.188,0.094,0.373,0.279,0.465l0.094,0.095
          c0,0,0,0,0,0.092c0,0.278,0.279,0.372,0.466,0.372h0.092c0,0.089,0.093,0.089,0.093,0.187c0.187,0.094,0.279,0.188,0.465,0.188
          c0.187,0,0.371-0.089,0.467-0.279c0.092,0,0.092,0,0.188,0c0.371,0,0.649-0.372,0.649-0.651h0.092l0,0c0,0,0-0.088,0.091-0.088
          c0.095-0.191,0.191-0.374,0.191-0.561c0-0.188-0.191-0.468-0.191-0.468l0,0c0,0-0.091,0-0.188-0.092v0.092l0,0v-0.092l0,0
          v-0.091c0-0.188-0.09-0.372-0.277-0.467c-0.191-0.092-0.283-0.188-0.563-0.188c-0.09,0-0.188,0-0.278,0.09
          c-0.091-0.09-0.28-0.09-0.371-0.09c-0.093,0-0.188,0-0.28,0.09c-0.092,0-0.188-0.09-0.371-0.09c-0.371,0-0.65,0.372-0.65,0.741
          C326.875,478.611,326.875,478.703,326.967,478.798z"></path>
        <path fill="#8CB347" d="M329.669,479.821L329.669,479.821L329.669,479.821z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M327.805,480.566L327.805,480.566c0,0.094,0,0.094,0.09,0.188c0.189,0.095,0.279,0.191,0.467,0.191
          s0.369-0.093,0.467-0.279c0.092,0,0.092,0,0.189,0c0.369,0,0.56-0.373,0.56-0.744l0,0l0,0c0.093,0,0.093-0.092,0.093-0.092
          c0.09-0.189,0.188-0.37,0.188-0.561c-0.092-0.188-0.092-0.371-0.279-0.467l0,0c-0.092,0-0.092-0.093-0.189-0.093l0,0l0,0l0,0
          l0,0c0,0,0,0,0-0.092c0-0.188-0.091-0.37-0.279-0.465s-0.279-0.191-0.56-0.191c-0.093,0-0.188,0-0.278,0.093
          c0.278,0.094,0.559,0.371,0.559,0.65c0.189,0.188,0.279,0.373,0.279,0.652c0,0.466-0.369,0.84-0.838,0.84
          C328.551,480.288,328.271,480.474,327.805,480.566C327.898,480.474,327.805,480.566,327.805,480.566z"></path>
        <path fill="#8CB347" d="M329.669,479.821L329.669,479.821L329.669,479.821z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M326.967,483.827c-0.089,0.188-0.188,0.371-0.188,0.563c0,0.187,0.094,0.368,0.279,0.466l0.094,0.092
          c0,0,0,0,0,0.09c0,0.283,0.279,0.372,0.466,0.372h0.092c0,0.093,0.093,0.093,0.093,0.189c0.187,0.091,0.279,0.188,0.465,0.188
          c0.187,0,0.371-0.093,0.467-0.28c0.092,0,0.092,0,0.188,0c0.371,0,0.649-0.372,0.649-0.65h0.092l0,0c0,0,0-0.093,0.091-0.093
          c0.095-0.188,0.191-0.56,0.191-0.743c0-0.188-0.191-0.649-0.191-0.649l0,0c0,0-0.091,0-0.188-0.093v0.093l0,0v0.093v0.089l0,0
          c0-0.188-0.09-0.368-0.277-0.466c-0.191-0.091-0.283-0.188-0.563-0.188c-0.09,0-0.188,0-0.278,0.092
          c-0.091-0.092-0.28-0.092-0.371-0.092c-0.093,0-0.188,0-0.28,0.092c-0.092,0-0.188-0.092-0.371-0.092
          c-0.371,0-0.65,0.371-0.65,0.742C326.967,483.641,326.875,483.733,326.967,483.827z"></path>
        <path fill="#8CB347" d="M329.761,484.851L329.761,484.851L329.761,484.851z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M327.805,485.409C327.805,485.503,327.805,485.503,327.805,485.409c0,0.093,0,0.093,0.09,0.189
          c0.189,0.091,0.279,0.188,0.467,0.188s0.369-0.091,0.467-0.279c0.092,0,0.092,0,0.189,0c0.369,0,0.56-0.372,0.56-0.743l0,0l0,0
          c0.093,0,0.093-0.091,0.093-0.091c0.09-0.188,0.188-0.371,0.188-0.559c0-0.188-0.092-0.372-0.279-0.467l0,0
          c-0.092,0-0.092-0.094-0.189-0.094l0,0l0,0l0,0l0,0c0,0,0,0,0-0.089c0-0.189-0.091-0.373-0.279-0.467s-0.279-0.188-0.56-0.188
          c-0.093,0-0.188,0-0.278,0.091c0.278,0.093,0.559,0.372,0.559,0.649c0.189,0.19,0.279,0.372,0.279,0.652
          c0,0.467-0.369,0.84-0.838,0.84C328.551,485.409,328.271,485.503,327.805,485.409
          C327.898,485.503,327.805,485.503,327.805,485.409z"></path>
        <path fill="#8CB347" d="M329.761,484.851L329.761,484.851L329.761,484.851z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M327.061,488.856c-0.093,0.187-0.186,0.371-0.186,0.56c0.088,0.19,0.088,0.37,0.277,0.467l0.09,0.088
          c0,0,0,0,0,0.096c0,0.278,0.279,0.371,0.468,0.371h0.092c0,0.092,0.091,0.092,0.091,0.187c0.189,0.092,0.278,0.191,0.467,0.191
          c0.188,0,0.371-0.096,0.467-0.279c0.092,0,0.092,0,0.189,0c0.368,0,0.648-0.373,0.648-0.652h0.091l0,0c0,0,0-0.094,0.095-0.094
          c0.09-0.186,0.187-0.186,0.187-0.467c0-0.186-0.187-0.368-0.187-0.368l0,0c0,0-0.095,0-0.189-0.094v0.094l0,0v-0.19v-0.089
          v-0.094c0-0.19-0.092-0.37-0.281-0.467c-0.186-0.089-0.279-0.188-0.559-0.188c-0.09,0-0.188,0-0.279,0.092
          c-0.092-0.092-0.279-0.092-0.372-0.092c-0.091,0-0.188,0-0.278,0.092c-0.092,0-0.188-0.092-0.373-0.092
          c-0.371,0-0.649,0.371-0.649,0.744C326.967,488.67,326.967,488.763,327.061,488.856z"></path>
        <path fill="#8CB347" d="M329.669,489.881L329.669,489.881L329.669,489.881z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M327.712,490.438L327.712,490.438c0,0.096,0,0.096,0.093,0.188c0.188,0.092,0.279,0.19,0.467,0.19
          c0.185,0,0.369-0.095,0.465-0.278c0.092,0,0.092,0,0.189,0c0.37,0,0.559-0.374,0.559-0.747l0,0l0,0
          c0.093,0,0.093-0.091,0.093-0.091c0.091-0.188,0.188-0.369,0.188-0.559c-0.091-0.188-0.091-0.374-0.279-0.467l0,0
          c-0.094,0-0.094-0.093-0.188-0.093l0,0l0,0l0,0l0,0c0,0,0,0,0-0.092c0-0.188-0.091-0.37-0.278-0.467
          c-0.189-0.094-0.281-0.189-0.563-0.189c-0.09,0-0.188,0-0.279,0.092c0.279,0.093,0.561,0.372,0.561,0.651
          c0.189,0.188,0.281,0.373,0.281,0.651c0,0.467-0.373,0.841-0.842,0.841C328.456,490.346,328.177,490.533,327.712,490.438
          C327.805,490.438,327.712,490.438,327.712,490.438z"></path>
        <path fill="#8CB347" d="M329.669,489.881L329.669,489.881L329.669,489.881z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M326.967,493.885c-0.089,0.188-0.188,0.369-0.188,0.56c0,0.188,0.094,0.372,0.279,0.467l0.094,0.091
          c0,0,0,0,0,0.093c0,0.28,0.279,0.368,0.466,0.368h0.092c0,0.094,0.093,0.094,0.093,0.191c0.187,0.093,0.279,0.188,0.465,0.188
          c0.187,0,0.371-0.091,0.467-0.282c0.092,0,0.092,0,0.188,0c0.371,0,0.649-0.369,0.649-0.648h0.092l0,0c0,0,0-0.091,0.091-0.091
          c0.095-0.189,0.191-0.372,0.191-0.563c0-0.188-0.191-0.56-0.191-0.56l0,0c0,0-0.091,0-0.188-0.091v0.091l0,0l0,0l0,0
          c0,0,0,0,0-0.091c0-0.188-0.09-0.371-0.277-0.467c-0.191-0.096-0.283-0.188-0.563-0.188c-0.09,0-0.188,0-0.278,0.09
          c-0.091-0.09-0.28-0.09-0.371-0.09c-0.093,0-0.188,0-0.28,0.09c-0.092,0-0.188-0.09-0.371-0.09c-0.371,0-0.65,0.369-0.65,0.74
          C326.875,493.605,326.875,493.791,326.967,493.885z"></path>
        <path fill="#8CB347" d="M329.669,494.91L329.669,494.91L329.669,494.91z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M327.805,495.468L327.805,495.468c0,0.092,0,0.092,0.09,0.19c0.189,0.093,0.279,0.188,0.467,0.188
          s0.369-0.09,0.467-0.279c0.092,0,0.092,0,0.189,0c0.369,0,0.56-0.372,0.56-0.741l0,0l0,0c0.093,0,0.093-0.092,0.093-0.092
          c0.09-0.188,0.188-0.372,0.188-0.561s-0.092-0.372-0.279-0.468l0,0c-0.092,0-0.092-0.088-0.189-0.088l0,0l0,0l0,0l0,0
          c0,0,0,0,0-0.093c0-0.188-0.091-0.372-0.279-0.467c-0.188-0.093-0.279-0.188-0.56-0.188c-0.093,0-0.188,0-0.278,0.093
          c0.278,0.09,0.559,0.372,0.559,0.651c0.189,0.188,0.279,0.37,0.279,0.649c0,0.466-0.369,0.841-0.838,0.841
          C328.551,495.281,328.271,495.468,327.805,495.468C327.898,495.468,327.805,495.468,327.805,495.468z"></path>
        <path fill="#8CB347" d="M329.669,494.91L329.669,494.91L329.669,494.91z"></path>
      </g>
    </g>
  </g>
  <g>
    <g>
      <g>
        <path fill="#8CB347" d="M317.841,452.72c-0.187-0.093-0.37-0.188-0.559-0.188c-0.191,0.092-0.372,0.092-0.468,0.278l-0.09,0.095
          c0,0,0,0-0.094,0c-0.279,0-0.372,0.276-0.372,0.466v0.092c-0.091,0-0.091,0.093-0.186,0.093
          c-0.095,0.188-0.191,0.28-0.191,0.467c0,0.19,0.093,0.372,0.279,0.467c0,0.09,0,0.09,0,0.188c0,0.373,0.373,0.561,0.743,0.561
          l0,0l0,0c0,0,0.094,0.093,0.094,0.188c0.188,0.096,0.188,0.188,0.369,0.188c0.188,0,0.373-0.188,0.373-0.188l0,0
          c0,0,0-0.092,0.091-0.188h-0.091l0,0h0.188h0.091h0.092c0.188,0,0.371-0.09,0.468-0.28c0.09-0.188,0.187-0.279,0.187-0.56
          c0-0.088,0-0.187-0.091-0.28c0.091-0.091,0.091-0.277,0.091-0.37c0-0.09,0-0.188-0.091-0.281c0-0.087,0.091-0.188,0.091-0.367
          c0-0.373-0.369-0.65-0.742-0.65C317.934,452.627,317.934,452.72,317.841,452.72z"></path>
        <path fill="#8CB347" d="M317.002,455.422L317.002,455.422L317.002,455.422z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M316.163,453.559L316.163,453.559c-0.088,0-0.088,0-0.188,0.094c-0.092,0.188-0.187,0.279-0.187,0.466
          c0,0.188,0.091,0.373,0.28,0.466c0,0.093,0,0.093,0,0.192c0,0.37,0.371,0.559,0.74,0.559l0,0l0,0
          c0,0.091,0.094,0.091,0.094,0.091c0.187,0.095,0.371,0.188,0.56,0.188c0.19,0,0.37-0.089,0.468-0.279l0,0
          c0-0.093,0.088-0.093,0.088-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.094,0c0.186,0,0.371-0.091,0.467-0.278
          c0.09-0.191,0.188-0.284,0.188-0.563c0-0.09,0-0.188-0.093-0.279c-0.091,0.279-0.371,0.559-0.651,0.559
          c-0.188,0.192-0.367,0.284-0.65,0.284c-0.465,0-0.838-0.372-0.838-0.843C316.536,454.117,316.256,453.932,316.163,453.559
          L316.163,453.559z"></path>
        <path fill="#8CB347" d="M317.002,455.422L317.002,455.422L317.002,455.422z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M312.813,452.627c-0.188-0.092-0.369-0.185-0.561-0.185c-0.188,0-0.372,0.089-0.466,0.276l-0.093,0.091
          c0,0,0,0-0.092,0c-0.279,0-0.373,0.283-0.373,0.466v0.09c-0.09,0-0.09,0.093-0.187,0.093c-0.094,0.186-0.188,0.279-0.188,0.467
          c0,0.187,0.09,0.37,0.279,0.466c0,0.095,0,0.095,0,0.19c0,0.369,0.372,0.561,0.742,0.561l0,0l0,0c0,0,0.091,0.09,0.091,0.188
          c0.188,0.092,0.373,0.191,0.562,0.191c0.188-0.096,0.559-0.191,0.559-0.191l0,0c0,0,0-0.092,0.094-0.188h-0.094l0,0l0,0l0,0
          c0,0,0,0,0.094,0c0.189,0,0.371-0.092,0.465-0.278c0.092-0.191,0.188-0.285,0.188-0.563c0-0.089,0-0.188-0.092-0.279
          c0.092-0.089,0.092-0.278,0.092-0.369s0-0.189-0.092-0.28c0-0.094,0.092-0.189,0.092-0.374c0-0.368-0.373-0.648-0.744-0.648
          C312.904,452.535,312.813,452.627,312.813,452.627z"></path>
        <path fill="#8CB347" d="M311.88,455.422L311.88,455.422L311.88,455.422z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M311.32,453.467C311.135,453.559,311.135,453.559,311.32,453.467c-0.092,0-0.092,0-0.188,0.092
          c-0.091,0.187-0.188,0.28-0.188,0.467c0,0.189,0.093,0.373,0.279,0.467c0,0.093,0,0.093,0,0.188
          c0,0.372,0.371,0.561,0.742,0.561l0,0l0,0c0,0.092,0.094,0.092,0.094,0.092c0.188,0.092,0.367,0.19,0.56,0.19
          c0.188,0,0.372-0.095,0.465-0.282l0,0c0-0.091,0.093-0.091,0.093-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.094,0
          c0.187,0,0.367-0.093,0.465-0.279c0.093-0.19,0.189-0.28,0.189-0.561c0-0.094,0-0.188-0.092-0.279
          c-0.092,0.279-0.373,0.56-0.652,0.56c-0.188,0.188-0.371,0.28-0.65,0.28c-0.467,0-0.84-0.372-0.84-0.84
          C311.507,454.024,311.229,453.932,311.32,453.467C311.135,453.559,311.135,453.559,311.32,453.467z"></path>
        <path fill="#8CB347" d="M311.88,455.422L311.88,455.422L311.88,455.422z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M307.782,452.72c-0.19-0.093-0.373-0.188-0.562-0.188c-0.188,0.092-0.371,0.092-0.468,0.278
          l-0.091,0.095c0,0,0,0-0.09,0c-0.279,0-0.371,0.276-0.371,0.466v0.092c-0.093,0-0.093,0.093-0.191,0.093
          c-0.088,0.188-0.187,0.28-0.187,0.467c0,0.19,0.093,0.372,0.28,0.467c0,0.09,0,0.09,0,0.188c0,0.373,0.371,0.561,0.745,0.561
          l0,0l0,0c0,0,0.088,0.093,0.088,0.188c0.19,0.096,0.563,0.188,0.744,0.188c0.187,0,0.74-0.188,0.74-0.188l0,0
          c0,0,0-0.092,0.094-0.188h-0.094l0,0h-0.186h-0.094l0,0c0.189,0,0.373-0.09,0.467-0.28c0.093-0.188,0.188-0.279,0.188-0.56
          c0-0.088,0-0.187-0.088-0.28c0.088-0.091,0.088-0.277,0.088-0.37c0-0.09,0-0.188-0.088-0.281c0-0.087,0.088-0.188,0.088-0.367
          c0-0.373-0.373-0.65-0.74-0.65C308.063,452.627,307.875,452.72,307.782,452.72z"></path>
        <path fill="#8CB347" d="M306.756,455.422L306.756,455.422L306.756,455.422z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M306.386,453.467C306.386,453.467,306.29,453.559,306.386,453.467c-0.091,0-0.091,0-0.188,0.092
          c-0.092,0.187-0.189,0.28-0.189,0.467c0,0.189,0.092,0.373,0.282,0.467c0,0.093,0,0.093,0,0.188c0,0.372,0.37,0.561,0.741,0.561
          l0,0l0,0c0,0.092,0.093,0.092,0.093,0.092c0.188,0.092,0.367,0.19,0.561,0.19c0.186-0.095,0.371-0.095,0.465-0.282l0,0
          c0-0.091,0.095-0.091,0.095-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.092,0c0.187,0,0.371-0.093,0.465-0.279
          c0.095-0.19,0.19-0.28,0.19-0.561c0-0.094,0-0.188-0.092-0.279c-0.094,0.279-0.373,0.56-0.652,0.56
          c-0.188,0.188-0.372,0.28-0.65,0.28c-0.467,0-0.84-0.372-0.84-0.84C306.29,454.024,306.386,453.839,306.386,453.467
          L306.386,453.467z"></path>
        <path fill="#8CB347" d="M306.756,455.422L306.756,455.422L306.756,455.422z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M297.816,452.627c-0.187-0.092-0.372-0.185-0.56-0.185c-0.187,0-0.372,0.089-0.467,0.276l-0.089,0.091
          c0,0,0,0-0.094,0c-0.279,0-0.37,0.283-0.37,0.466v0.09c-0.09,0-0.09,0.093-0.188,0.093c-0.093,0.186-0.191,0.279-0.191,0.467
          c0,0.187,0.093,0.37,0.281,0.466c0,0.095,0,0.095,0,0.19c0,0.369,0.372,0.561,0.743,0.561l0,0l0,0c0,0,0.093,0.09,0.093,0.188
          c0.188,0.092,0.465,0.191,0.652,0.191c0.185-0.096,0.558-0.191,0.558-0.191l0,0c0,0,0-0.092,0.091-0.188h-0.091l0,0l0,0l0,0l0,0
          c0.188,0,0.374-0.092,0.466-0.278c0.094-0.191,0.19-0.285,0.19-0.563c0-0.089,0-0.188-0.091-0.279
          c0.091-0.089,0.091-0.278,0.091-0.369s0-0.189-0.091-0.28c0-0.094,0.091-0.189,0.091-0.374c0-0.368-0.373-0.648-0.743-0.648
          C297.91,452.535,297.91,452.627,297.816,452.627z"></path>
        <path fill="#8CB347" d="M296.979,455.422L296.979,455.422L296.979,455.422z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M296.139,453.559L296.139,453.559c-0.091,0-0.091,0-0.189,0.094c-0.093,0.188-0.187,0.279-0.187,0.466
          c0,0.188,0.089,0.373,0.279,0.466c0,0.093,0,0.093,0,0.192c0,0.37,0.372,0.559,0.74,0.559l0,0l0,0
          c0,0.091,0.093,0.091,0.093,0.091c0.186,0.095,0.371,0.188,0.559,0.188c0.191,0,0.372-0.089,0.467-0.279l0,0
          c0-0.093,0.088-0.093,0.088-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.094,0c0.188,0,0.372-0.091,0.466-0.278
          c0.089-0.191,0.188-0.284,0.188-0.563c0-0.09,0-0.188-0.093-0.279c-0.089,0.279-0.37,0.559-0.652,0.559
          c-0.187,0.192-0.368,0.284-0.648,0.284c-0.467,0-0.842-0.372-0.842-0.843C296.513,454.024,296.139,453.932,296.139,453.559
          L296.139,453.559z"></path>
        <path fill="#8CB347" d="M296.979,455.422L296.979,455.422L296.979,455.422z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M292.79,452.627c-0.188-0.092-0.37-0.185-0.561-0.185c-0.188,0.089-0.371,0.089-0.465,0.276
          l-0.091,0.091c0,0,0,0-0.094,0c-0.279,0-0.368,0.283-0.368,0.466v0.09c-0.094,0-0.094,0.093-0.19,0.093
          c-0.089,0.186-0.188,0.279-0.188,0.467c0,0.187,0.093,0.37,0.279,0.466c0,0.095,0,0.095,0,0.19c0,0.369,0.373,0.561,0.742,0.561
          l0,0l0,0c0,0,0.092,0.09,0.092,0.188c0.19,0.092,0.19,0.191,0.372,0.191c0.187,0,0.28-0.191,0.28-0.191l0,0
          c0,0,0-0.092,0.092-0.188h-0.092l0,0h0.28h0.091h0.091c0.189,0,0.37-0.092,0.467-0.278c0.092-0.191,0.188-0.285,0.188-0.563
          c0-0.089,0-0.188-0.09-0.279c0.09-0.089,0.09-0.278,0.09-0.369s0-0.189-0.09-0.28c0-0.094,0.09-0.189,0.09-0.374
          c0-0.368-0.369-0.648-0.743-0.648C292.881,452.627,292.79,452.627,292.79,452.627z"></path>
        <path fill="#8CB347" d="M291.856,455.422L291.856,455.422L291.856,455.422z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M291.205,453.559L291.205,453.559c-0.094,0-0.094,0-0.19,0.094c-0.09,0.188-0.188,0.279-0.188,0.466
          c0,0.188,0.09,0.373,0.279,0.466c0,0.093,0,0.093,0,0.192c0,0.37,0.373,0.559,0.742,0.559l0,0l0,0
          c0,0.091,0.092,0.091,0.092,0.091c0.188,0.095,0.374,0.188,0.56,0.188c0.189,0,0.372-0.089,0.467-0.279l0,0
          c0-0.093,0.091-0.093,0.091-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.09,0c0.189,0,0.372-0.091,0.467-0.278
          c0.09-0.191,0.188-0.284,0.188-0.563c0-0.09,0-0.188-0.093-0.279c-0.09,0.279-0.37,0.559-0.649,0.559
          c-0.189,0.192-0.372,0.284-0.65,0.284c-0.467,0-0.843-0.372-0.843-0.843C291.484,454.024,291.298,453.932,291.205,453.559
          L291.205,453.559z"></path>
        <path fill="#8CB347" d="M291.856,455.422L291.856,455.422L291.856,455.422z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M287.759,452.72c-0.19-0.093-0.372-0.188-0.56-0.188c-0.189,0-0.372,0.092-0.467,0.278l-0.091,0.095
          c0,0,0,0-0.09,0c-0.28,0-0.373,0.276-0.373,0.466v0.092c-0.092,0-0.092,0.093-0.187,0.093c-0.093,0.188-0.19,0.28-0.19,0.467
          c0,0.19,0.092,0.372,0.28,0.467c0,0.09,0,0.09,0,0.188c0,0.373,0.372,0.561,0.743,0.561l0,0l0,0c0,0,0.092,0.093,0.092,0.188
          c0.189,0.096,0.28,0.188,0.561,0.188c0.187,0,0.466-0.188,0.466-0.188l0,0c0,0,0-0.092,0.091-0.188h-0.091l0,0h0.091l0,0h0.092
          c0.187,0,0.369-0.09,0.466-0.28c0.092-0.188,0.188-0.279,0.188-0.56c0-0.088,0-0.187-0.089-0.28
          c0.089-0.091,0.089-0.277,0.089-0.37c0-0.09,0-0.188-0.089-0.281c0-0.087,0.089-0.188,0.089-0.367
          c0-0.373-0.368-0.65-0.741-0.65C287.946,452.627,287.85,452.72,287.759,452.72z"></path>
        <path fill="#8CB347" d="M286.734,455.422L286.734,455.422L286.734,455.422z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M286.362,453.559C286.362,453.559,286.268,453.559,286.362,453.559c-0.09,0-0.09,0-0.187,0.094
          c-0.092,0.188-0.188,0.279-0.188,0.466c0,0.188,0.09,0.373,0.279,0.466c0,0.093,0,0.093,0,0.192c0,0.37,0.369,0.559,0.742,0.559
          l0,0l0,0c0,0.091,0.091,0.091,0.091,0.091c0.188,0.095,0.373,0.188,0.56,0.188c0.19-0.089,0.372-0.089,0.466-0.279l0,0
          c0-0.093,0.091-0.093,0.091-0.188l0,0l0,0l0,0l0,0c0,0,0,0,0.092,0c0.187,0,0.372-0.091,0.466-0.278
          c0.093-0.191,0.189-0.284,0.189-0.563c0-0.09,0-0.188-0.091-0.279c-0.091,0.279-0.373,0.559-0.652,0.559
          c-0.187,0.192-0.371,0.284-0.652,0.284c-0.466,0-0.838-0.372-0.838-0.843C286.268,454.117,286.362,453.932,286.362,453.559
          L286.362,453.559z"></path>
        <path fill="#8CB347" d="M286.734,455.422L286.734,455.422L286.734,455.422z"></path>
      </g>
    </g>
  </g>
  <g>
    <g>
      <g>
        <path fill="#8CB347" d="M270.157,352.791c-0.372-0.278-0.741-0.372-1.118-0.372c-0.372,0-0.842,0.188-1.121,0.559
          c-0.09,0.094-0.09,0.094-0.188,0.187h-0.091c-0.56,0-0.931,0.558-0.931,1.023c0,0.095,0,0.095,0,0.188
          c-0.09,0.093-0.28,0.187-0.372,0.278c-0.281,0.279-0.371,0.652-0.371,1.119c0,0.465,0.281,0.838,0.652,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.74,1.21,1.397,1.304l0,0l0,0c0.093,0,0.187,0.279,0.28,0.373
          c0.28,0.276,0.931,0.465,1.303,0.465c0.373,0,0.279-0.465,1.119-0.465l0,0c0,0,0-0.281,0.091-0.373h-0.091l0,0l0,0l0,0h0.091
          c0.373,0,0.746-0.188,1.025-0.559c0.279-0.374,0.369-0.744,0.369-1.119c0-0.186-0.09-0.373-0.186-0.559
          c0.186-0.279,0.186-0.558,0.186-0.838s-0.09-0.467-0.186-0.652c0.091-0.186,0.091-0.467,0.091-0.746
          c0-0.837-0.841-1.396-1.583-1.303C270.53,352.605,270.25,352.791,270.157,352.791z"></path>
        <path fill="#8CB347" d="M266.339,358.567L266.339,358.567L266.339,358.567z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M266.712,354.375L266.712,354.375c-0.188,0-0.281,0.093-0.369,0.188
          c-0.282,0.278-0.374,0.651-0.374,1.116s0.281,0.836,0.653,1.117c0,0.095,0,0.281,0,0.467c0,0.745,0.74,1.306,1.397,1.306
          c0,0,0,0,0,0.094l0,0c0.093,0.092,0.19,0.187,0.279,0.279c0.28,0.278,0.745,0.466,1.212,0.372c0.372,0,0.841-0.187,1.022-0.559
          l0,0c0.092-0.092,0.188-0.186,0.188-0.373l0,0l0,0l0,0l0,0h0.092c0.372,0,0.745-0.187,1.024-0.558
          c0.279-0.371,0.369-0.745,0.369-1.118c0-0.187,0-0.373-0.09-0.558c-0.19,0.651-0.744,1.117-1.401,1.303
          c-0.369,0.374-0.838,0.56-1.301,0.56c-1.024,0-1.862-0.837-1.862-1.861c-0.467-0.373-0.841-0.932-0.931-1.583
          C266.712,354.563,266.712,354.471,266.712,354.375z"></path>
        <path fill="#8CB347" d="M266.339,358.567L266.339,358.567L266.339,358.567z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M279.75,352.791c-0.372-0.278-0.744-0.372-1.119-0.372c-0.371,0-0.84,0.188-1.121,0.559
          c-0.092,0.094-0.092,0.094-0.187,0.187h-0.093c-0.559,0-0.931,0.558-0.931,1.023c0,0.095,0,0.095,0,0.188
          c-0.093,0.093-0.279,0.187-0.372,0.278c-0.28,0.279-0.369,0.652-0.369,1.119c0,0.465,0.279,0.838,0.648,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.745,1.21,1.401,1.304l0,0l0,0c0.091,0,0.188,0.279,0.279,0.373
          c0.28,0.276,0.932,0.465,1.304,0.465c0.368,0,0.279-0.465,1.118-0.465l0,0c0,0,0-0.281,0.093-0.373h-0.093l0,0l0,0l0,0h0.093
          c0.372,0,0.741-0.188,1.02-0.559c0.281-0.374,0.373-0.744,0.373-1.119c0-0.186-0.093-0.373-0.188-0.559
          c0.188-0.279,0.188-0.558,0.188-0.838s-0.093-0.467-0.188-0.652c0.09-0.186,0.09-0.467,0.09-0.746
          c0-0.837-0.839-1.396-1.58-1.303C280.123,352.605,279.843,352.698,279.75,352.791z"></path>
        <path fill="#8CB347" d="M277.514,358.659L277.514,358.659L277.514,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M276.397,354.375L276.397,354.375c-0.19,0-0.28,0.093-0.373,0.188c-0.279,0.278-0.372,0.651-0.372,1.116
          s0.281,0.836,0.652,1.117c0,0.095,0,0.281,0,0.467c0,0.745,0.744,1.306,1.401,1.306c0,0,0,0,0,0.094l0,0
          c0.09,0.092,0.188,0.187,0.279,0.279c0.28,0.278,0.742,0.466,1.212,0.372c0.372,0,0.837-0.187,1.02-0.559l0,0
          c0.094-0.092,0.19-0.186,0.19-0.373l0,0l0,0l0,0l0,0h0.089c0.373,0,0.746-0.187,1.025-0.558c0.19-0.374,0.372-0.745,0.372-1.118
          c0-0.187,0-0.373-0.093-0.558c-0.188,0.651-0.741,1.117-1.398,1.303c-0.372,0.374-0.84,0.56-1.303,0.56
          c-1.024,0-1.863-0.837-1.863-1.861c-0.465-0.373-0.839-0.932-0.931-1.583C276.304,354.563,276.304,354.471,276.397,354.375z"></path>
        <path fill="#8CB347" d="M277.514,358.659L277.514,358.659L277.514,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M291.019,352.791c-0.373-0.278-0.741-0.372-1.119-0.372s-0.84,0.188-1.121,0.559
          c-0.089,0.094-0.089,0.094-0.187,0.187H288.5c-0.559,0-0.932,0.558-0.932,1.023c0,0.095,0,0.095,0,0.188
          c-0.088,0.093-0.279,0.187-0.369,0.278c-0.279,0.279-0.371,0.652-0.371,1.119c0,0.465,0.279,0.838,0.652,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.741,1.21,1.398,1.304l0,0l0,0c0.091,0,0.189,0.279,0.279,0.373
          c0.279,0.276,0.931,0.465,1.303,0.465c0.371,0,0.28-0.465,1.117-0.465l0,0c0,0,0-0.281,0.094-0.373h-0.094l0,0l0,0l0,0h0.094
          c0.371,0,0.743-0.188,1.022-0.559c0.28-0.374,0.372-0.744,0.372-1.119c0-0.186-0.091-0.373-0.189-0.559
          c0.189-0.279,0.189-0.558,0.189-0.838s-0.091-0.467-0.189-0.652c0.093-0.186,0.093-0.467,0.093-0.746
          c0-0.837-0.843-1.396-1.582-1.303C291.39,352.513,291.111,352.698,291.019,352.791z"></path>
        <path fill="#8CB347" d="M288.69,358.659L288.69,358.659L288.69,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M287.573,354.471L287.573,354.471c-0.188,0-0.279,0.092-0.37,0.186c-0.278,0.278-0.372,0.65-0.372,1.118
          c0,0.467,0.279,0.837,0.652,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.741,1.303,1.398,1.303c0,0,0,0,0,0.095l0,0
          c0.091,0.093,0.191,0.188,0.279,0.278c0.279,0.281,0.744,0.467,1.21,0.373c0.373,0,0.843-0.188,1.025-0.559l0,0
          c0.091-0.093,0.189-0.188,0.189-0.374l0,0l0,0l0,0l0,0h0.09c0.372,0,0.744-0.185,1.022-0.558
          c0.281-0.373,0.373-0.743,0.373-1.116c0-0.188,0-0.373-0.092-0.558c-0.189,0.649-0.745,1.117-1.401,1.304
          c-0.369,0.372-0.838,0.559-1.3,0.559c-1.024,0-1.863-0.839-1.863-1.862c-0.467-0.374-0.842-0.932-0.931-1.583
          C287.573,354.653,287.573,354.563,287.573,354.471z"></path>
        <path fill="#8CB347" d="M288.69,358.659L288.69,358.659L288.69,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M302.101,352.791c-0.372-0.278-0.741-0.372-1.12-0.372c-0.372,0-0.837,0.188-1.121,0.559
          c-0.088,0.094-0.088,0.094-0.185,0.187h-0.094c-0.558,0-0.931,0.558-0.931,1.023c0,0.095,0,0.095,0,0.188
          c-0.089,0.093-0.279,0.187-0.371,0.278c-0.282,0.279-0.371,0.652-0.371,1.119c0,0.465,0.279,0.838,0.652,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.742,1.21,1.399,1.304l0,0l0,0c0.09,0,0.19,0.279,0.278,0.373
          c0.279,0.276,0.743,0.276,1.211,0.276c0.373,0,0.842-0.649,1.023-0.649l0,0c0.093,0,0.188-0.094,0.28-0.188l0.092,0.188l0,0l0,0
          l0,0h0.09c0.372,0,0.744-0.188,1.024-0.559c0.278-0.372,0.371-0.744,0.371-1.119c0-0.186-0.093-0.373-0.19-0.559
          c0.19-0.279,0.19-0.558,0.19-0.838s-0.093-0.467-0.19-0.652c0.093-0.186,0.093-0.467,0.093-0.746
          c0-0.837-0.839-1.397-1.582-1.303C302.566,352.605,302.194,352.698,302.101,352.791z"></path>
        <path fill="#8CB347" d="M299.865,358.659L299.865,358.659L299.865,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M298.749,354.471L298.749,354.471c-0.188,0-0.281,0.092-0.373,0.186
          c-0.279,0.278-0.372,0.65-0.372,1.118c0,0.467,0.283,0.837,0.651,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.742,1.303,1.4,1.303
          c0,0,0,0,0,0.095l0,0c0.094,0.093,0.188,0.188,0.279,0.278c0.282,0.281,0.747,0.467,1.213,0.373
          c0.371,0,0.838-0.188,1.022-0.559l0,0c0.09-0.093,0.188-0.188,0.188-0.374l0,0l0,0l0,0l0,0h0.091
          c0.373,0,0.742-0.185,1.023-0.558c0.281-0.373,0.369-0.743,0.369-1.116c0-0.188,0-0.373-0.088-0.558
          c-0.191,0.649-0.744,1.117-1.401,1.304c-0.373,0.372-0.84,0.559-1.304,0.559c-1.02,0-1.863-0.839-1.863-1.862
          c-0.465-0.374-0.837-0.932-0.93-1.583C298.656,354.653,298.656,354.563,298.749,354.471z"></path>
        <path fill="#8CB347" d="M299.865,358.659L299.865,358.659L299.865,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M313.37,352.698c-0.37-0.28-0.741-0.373-1.118-0.373c-0.372,0-0.838,0.188-1.119,0.558
          c-0.091,0.094-0.091,0.094-0.189,0.188h-0.09c-0.562,0-0.931,0.559-0.931,1.023c0,0.093,0,0.093,0,0.188
          c-0.093,0.093-0.278,0.186-0.373,0.278c-0.278,0.279-0.37,0.652-0.37,1.117s0.278,0.838,0.65,1.119c0,0.093,0,0.279,0,0.466
          c0,0.744,0.743,1.21,1.398,1.305l0,0l0,0c0.092,0,0.189,0.278,0.283,0.373c0.278,0.278,0.739,0.278,1.209,0.278
          c0.369,0,0.84-0.651,1.021-0.651l0,0c0.092,0,0.188-0.095,0.279-0.186l0.092,0.186l0,0l0,0l0,0h0.093
          c0.372,0,0.741-0.186,1.021-0.56c0.282-0.373,0.373-0.745,0.373-1.116c0-0.188-0.091-0.373-0.188-0.56
          c0.188-0.279,0.188-0.558,0.188-0.837s-0.091-0.466-0.188-0.652c0.091-0.187,0.091-0.467,0.091-0.745
          c0-0.838-0.839-1.397-1.583-1.304C313.743,352.605,313.463,352.698,313.37,352.698z"></path>
        <path fill="#8CB347" d="M311.042,358.567L311.042,358.567L311.042,358.567z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M309.924,354.471L309.924,354.471c-0.189,0-0.277,0.092-0.373,0.186
          c-0.279,0.278-0.369,0.65-0.369,1.118c0,0.467,0.277,0.837,0.651,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.743,1.303,1.396,1.303
          c0,0,0,0,0,0.095l0,0c0.094,0.093,0.19,0.188,0.283,0.278c0.279,0.281,0.741,0.467,1.211,0.373c0.368,0,0.838-0.188,1.021-0.559
          l0,0c0.091-0.093,0.188-0.188,0.188-0.374l0,0l0,0l0,0l0,0h0.09c0.371,0,0.744-0.185,1.023-0.558s0.372-0.743,0.372-1.116
          c0-0.188,0-0.373-0.093-0.558c-0.188,0.649-0.741,1.117-1.398,1.304c-0.371,0.372-0.841,0.559-1.303,0.559
          c-1.023,0-1.861-0.839-1.861-1.862c-0.465-0.374-0.84-0.932-0.931-1.583C309.924,354.653,309.924,354.563,309.924,354.471z"></path>
        <path fill="#8CB347" d="M311.042,358.567L311.042,358.567L311.042,358.567z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M324.452,352.791c-0.369-0.278-0.74-0.372-1.117-0.372c-0.372,0-0.839,0.188-1.12,0.559
          c-0.091,0.094-0.091,0.094-0.188,0.187h-0.092c-0.562,0-0.93,0.558-0.93,1.023c0,0.095,0,0.095,0,0.188
          c-0.094,0.093-0.279,0.187-0.372,0.278c-0.28,0.279-0.372,0.652-0.372,1.119c0,0.465,0.278,0.838,0.65,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.74,1.21,1.398,1.304l0,0l0,0c0.092,0,0.189,0.279,0.278,0.373
          c0.283,0.276,0.745,0.276,1.214,0.276c0.369,0,0.84-0.649,1.021-0.649l0,0c0.091,0,0.189-0.094,0.279-0.188l0.09,0.188l0,0l0,0
          l0,0h0.096c0.37,0,0.74-0.188,1.02-0.559c0.19-0.374,0.373-0.744,0.373-1.119c0-0.186-0.094-0.373-0.188-0.559
          c0.188-0.279,0.188-0.558,0.188-0.838s-0.094-0.467-0.188-0.652c0.089-0.186,0.089-0.467,0.089-0.746
          c0-0.837-0.838-1.397-1.584-1.303C324.918,352.605,324.545,352.698,324.452,352.791z"></path>
        <path fill="#8CB347" d="M322.217,358.659L322.217,358.659L322.217,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M321.1,354.375L321.1,354.375c-0.188,0-0.279,0.093-0.367,0.188c-0.281,0.278-0.373,0.651-0.373,1.116
          s0.279,0.836,0.652,1.117c0,0.095,0,0.281,0,0.467c0,0.745,0.739,1.306,1.396,1.306c0,0,0,0,0,0.094l0,0
          c0.093,0.092,0.189,0.187,0.279,0.279c0.279,0.278,0.744,0.466,1.211,0.372c0.373,0,0.843-0.187,1.022-0.559l0,0
          c0.093-0.092,0.188-0.186,0.188-0.373l0,0l0,0l0,0l0,0h0.092c0.371,0,0.744-0.187,1.023-0.558
          c0.278-0.371,0.371-0.745,0.371-1.118c0-0.187,0-0.373-0.093-0.558c-0.188,0.651-0.743,1.117-1.399,1.303
          c-0.369,0.374-0.838,0.56-1.301,0.56c-1.022,0-1.863-0.837-1.863-1.861c-0.467-0.373-0.842-0.932-0.93-1.583
          C321.007,354.563,321.1,354.471,321.1,354.375z"></path>
        <path fill="#8CB347" d="M322.217,358.659L322.217,358.659L322.217,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M335.721,352.791c-0.371-0.278-0.742-0.372-1.121-0.372c-0.371,0-0.838,0.188-1.117,0.559
          c-0.092,0.094-0.092,0.094-0.188,0.187h-0.092c-0.56,0-0.931,0.558-0.931,1.023c0,0.095,0,0.095,0,0.188
          c-0.094,0.093-0.28,0.187-0.373,0.278c-0.279,0.279-0.371,0.652-0.371,1.119c0,0.465,0.281,0.838,0.65,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.744,1.21,1.401,1.304l0,0l0,0c0.088,0,0.187,0.279,0.278,0.373
          c0.279,0.276,0.931,0.372,1.303,0.372c0.369,0,0.279-0.095,1.212-0.652l0,0c0,0,0-0.092,0.09-0.278l0,0l0,0h-0.09l0,0h0.09
          c0.372,0,0.743-0.186,1.024-0.559c0.279-0.372,0.371-0.745,0.371-1.118c0-0.188-0.092-0.374-0.191-0.558
          c0.191-0.281,0.191-0.559,0.191-0.839c0-0.279-0.092-0.466-0.191-0.65c0.095-0.188,0.095-0.467,0.095-0.745
          c0-0.84-0.84-1.397-1.584-1.304C336.094,352.513,335.814,352.698,335.721,352.791z"></path>
        <path fill="#8CB347" d="M333.393,358.659L333.393,358.659L333.393,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M332.275,354.471L332.275,354.471c-0.188,0-0.279,0.092-0.371,0.186c-0.28,0.278-0.372,0.65-0.372,1.118
          c0,0.467,0.28,0.837,0.651,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.743,1.303,1.4,1.303c0,0,0,0,0,0.095l0,0
          c0.088,0.093,0.186,0.188,0.279,0.278c0.279,0.281,0.74,0.467,1.209,0.373c0.373,0,0.841-0.188,1.025-0.559l0,0
          c0.09-0.093,0.187-0.188,0.187-0.374l0,0l0,0l0,0l0,0h0.093c0.368,0,0.742-0.185,1.021-0.558
          c0.281-0.373,0.373-0.743,0.373-1.116c0-0.188,0-0.373-0.094-0.558c-0.188,0.649-0.74,1.117-1.396,1.304
          c-0.372,0.372-0.84,0.559-1.305,0.559c-1.024,0-1.861-0.839-1.861-1.862c-0.467-0.374-0.84-0.932-0.932-1.583
          C332.275,354.653,332.275,354.563,332.275,354.471z"></path>
        <path fill="#8CB347" d="M333.393,358.659L333.393,358.659L333.393,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M346.805,352.791c-0.373-0.278-0.744-0.372-1.121-0.372c-0.371,0-0.839,0.188-1.119,0.559
          c-0.092,0.094-0.092,0.094-0.189,0.187h-0.09c-0.559,0-0.932,0.558-0.932,1.023c0,0.095,0,0.095,0,0.188
          c-0.093,0.093-0.278,0.187-0.373,0.278c-0.279,0.279-0.371,0.652-0.371,1.119c0,0.465,0.279,0.838,0.651,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.744,1.21,1.401,1.304l0,0l0,0c0.089,0,0.188,0.279,0.279,0.373
          c0.278,0.276,1.02,0.558,1.3,0.465c0.372,0,0.282-0.559,1.12-0.465l0,0c0,0,0-0.281,0.093-0.373l0,0l0,0h-0.093l0,0h0.093
          c0.37,0,0.741-0.188,1.021-0.559c0.28-0.374,0.373-0.744,0.373-1.119c0-0.186-0.093-0.373-0.188-0.559
          c0.188-0.279,0.188-0.558,0.188-0.838s-0.093-0.467-0.188-0.652c0.091-0.186,0.091-0.467,0.091-0.746
          c0-0.837-0.84-1.396-1.583-1.303C347.27,352.605,346.99,352.698,346.805,352.791z"></path>
        <path fill="#8CB347" d="M344.568,358.659L344.568,358.659L344.568,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M343.45,354.471L343.45,354.471c-0.188,0-0.28,0.092-0.372,0.186c-0.278,0.278-0.372,0.65-0.372,1.118
          c0,0.467,0.28,0.837,0.651,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.74,1.303,1.397,1.303c0,0,0,0,0,0.095l0,0
          c0.095,0.093,0.19,0.188,0.279,0.278c0.284,0.281,0.745,0.467,1.216,0.373c0.367,0,0.837-0.188,1.02-0.559l0,0
          c0.094-0.093,0.19-0.188,0.19-0.374l0,0l0,0l0,0l0,0h0.089c0.373,0,0.744-0.185,1.023-0.558s0.371-0.743,0.371-1.116
          c0-0.188,0-0.373-0.092-0.558c-0.188,0.649-0.74,1.117-1.396,1.304c-0.374,0.372-0.844,0.559-1.305,0.559
          c-1.022,0-1.862-0.839-1.862-1.862c-0.468-0.374-0.839-0.932-0.933-1.583C343.357,354.653,343.45,354.563,343.45,354.471z"></path>
        <path fill="#8CB347" d="M344.568,358.659L344.568,358.659L344.568,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M358.073,352.791c-0.374-0.278-0.744-0.372-1.119-0.372c-0.372,0-0.843,0.188-1.122,0.559
          c-0.089,0.094-0.089,0.094-0.188,0.187h-0.093c-0.558,0-0.932,0.558-0.932,1.023c0,0.095,0,0.095,0,0.188
          c-0.089,0.093-0.278,0.187-0.368,0.278c-0.284,0.279-0.372,0.652-0.372,1.119c0,0.465,0.279,0.838,0.652,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.739,1.21,1.396,1.304l0,0l0,0c0.094,0,0.19,0.279,0.28,0.373
          c0.278,0.276,0.933,0.372,1.304,0.372s0.279-0.095,1.209-0.652l0,0c0,0,0-0.092,0.094-0.278l0,0l0,0h-0.094l0,0h0.094
          c0.373,0,0.74-0.186,1.021-0.559c0.28-0.372,0.372-0.745,0.372-1.118c0-0.188-0.092-0.374-0.188-0.558
          c0.188-0.281,0.188-0.559,0.188-0.839c0-0.279-0.092-0.466-0.188-0.65c0.09-0.188,0.09-0.467,0.09-0.745
          c0-0.84-0.84-1.397-1.582-1.304C358.445,352.605,358.165,352.698,358.073,352.791z"></path>
        <path fill="#8CB347" d="M355.745,358.567L355.745,358.567L355.745,358.567z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M354.627,354.471L354.627,354.471c-0.188,0-0.279,0.092-0.373,0.186
          c-0.279,0.278-0.367,0.65-0.367,1.118c0,0.467,0.278,0.837,0.651,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.739,1.303,1.397,1.303
          c0,0,0,0,0,0.095l0,0c0.092,0.093,0.188,0.188,0.278,0.278c0.28,0.281,0.744,0.467,1.211,0.373c0.372,0,0.843-0.188,1.024-0.559
          l0,0c0.088-0.093,0.186-0.188,0.186-0.374l0,0l0,0l0,0l0,0h0.094c0.371,0,0.74-0.185,1.022-0.558
          c0.188-0.373,0.37-0.743,0.37-1.116c0-0.188,0-0.373-0.092-0.558c-0.188,0.649-0.742,1.117-1.399,1.304
          c-0.371,0.372-0.838,0.559-1.302,0.559c-1.021,0-1.861-0.839-1.861-1.862c-0.467-0.374-0.841-0.932-0.93-1.583
          C354.627,354.653,354.627,354.563,354.627,354.471z"></path>
        <path fill="#8CB347" d="M355.745,358.567L355.745,358.567L355.745,358.567z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M369.154,352.791c-0.371-0.278-0.743-0.372-1.116-0.372c-0.372,0-0.843,0.188-1.123,0.559
          c-0.088,0.094-0.088,0.094-0.187,0.187h-0.092c-0.561,0-0.933,0.558-0.933,1.023c0,0.095,0,0.095,0,0.188
          c-0.09,0.093-0.279,0.187-0.372,0.278c-0.279,0.279-0.369,0.652-0.369,1.119c0,0.465,0.279,0.838,0.65,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.742,1.21,1.4,1.304l0,0l0,0c0.092,0,0.187,0.279,0.278,0.373
          c0.278,0.276,0.744,0.276,1.117,0.276c0.372,0,0.932-0.649,1.024-0.649l0,0c0,0.931,0.278-0.094,0.278-0.188l0.093,0.095l0,0
          l0,0l0,0h0.088c0.375,0,0.746-0.188,1.026-0.56c0.278-0.373,0.369-0.744,0.369-1.118c0-0.187-0.091-0.373-0.188-0.558
          c0.188-0.279,0.188-0.558,0.188-0.837s-0.091-0.467-0.188-0.652c0.092-0.188,0.092-0.466,0.092-0.746
          c0-0.836-0.838-1.396-1.582-1.303C369.62,352.605,369.342,352.698,369.154,352.791z"></path>
        <path fill="#8CB347" d="M366.919,358.659L366.919,358.659L366.919,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M365.803,354.375L365.803,354.375c-0.188,0-0.279,0.093-0.371,0.188
          c-0.279,0.278-0.373,0.651-0.373,1.116s0.279,0.836,0.652,1.117c0,0.095,0,0.281,0,0.467c0,0.745,0.743,1.306,1.4,1.306
          c0,0,0,0,0,0.094l0,0c0.09,0.092,0.188,0.187,0.277,0.279c0.281,0.278,0.742,0.466,1.213,0.372c0.371,0,0.838-0.187,1.021-0.559
          l0,0c0.093-0.092,0.19-0.186,0.19-0.373l0,0l0,0l0,0l0,0h0.088c0.373,0,0.746-0.187,1.025-0.558
          c0.278-0.374,0.369-0.745,0.369-1.118c0-0.187,0-0.373-0.091-0.558c-0.188,0.651-0.74,1.117-1.397,1.303
          c-0.371,0.374-0.841,0.56-1.304,0.56c-1.022,0-1.86-0.837-1.86-1.861c-0.468-0.373-0.84-0.932-0.933-1.583
          C365.803,354.563,365.803,354.471,365.803,354.375z"></path>
        <path fill="#8CB347" d="M366.919,358.659L366.919,358.659L366.919,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M380.424,352.791c-0.369-0.278-0.74-0.372-1.119-0.372c-0.373,0-0.838,0.188-1.117,0.559
          c-0.092,0.094-0.092,0.094-0.189,0.187h-0.088c-0.563,0-0.932,0.558-0.932,1.023c0,0.095,0,0.095,0,0.188
          c-0.094,0.093-0.283,0.187-0.373,0.278c-0.278,0.279-0.369,0.652-0.369,1.119c0,0.465,0.277,0.838,0.648,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.742,1.21,1.399,1.304l0,0l0,0c0.091,0,0.188,0.279,0.278,0.373
          c0.283,0.276,0.744,0.276,1.211,0.276c0.371,0,0.842-0.649,1.022-0.649l0,0c0.093,0,0.19-0.094,0.28-0.188l0.092,0.188l0,0l0,0
          l0,0h0.092c0.37,0,0.743-0.188,1.022-0.559c0.278-0.372,0.372-0.744,0.372-1.119c0-0.186-0.094-0.373-0.188-0.559
          c0.188-0.279,0.188-0.558,0.188-0.838s-0.094-0.467-0.188-0.652c0.089-0.186,0.089-0.467,0.089-0.746
          c0-0.837-0.84-1.397-1.582-1.303C380.703,352.513,380.516,352.698,380.424,352.791z"></path>
        <path fill="#8CB347" d="M378.096,358.659L378.096,358.659L378.096,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M376.979,354.471L376.979,354.471c-0.19,0-0.283,0.092-0.373,0.186c-0.278,0.278-0.369,0.65-0.369,1.118
          c0,0.467,0.277,0.837,0.648,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.742,1.303,1.399,1.303c0,0,0,0,0,0.095l0,0
          c0.091,0.093,0.188,0.188,0.278,0.278c0.278,0.281,0.744,0.467,1.211,0.373c0.371,0,0.842-0.188,1.022-0.559l0,0
          c0.093-0.093,0.187-0.188,0.187-0.374l0,0l0,0l0,0l0,0h0.095c0.371,0,0.743-0.185,1.022-0.558
          c0.278-0.373,0.373-0.743,0.373-1.116c0-0.188,0-0.373-0.095-0.558c-0.187,0.649-0.743,1.117-1.399,1.304
          c-0.367,0.372-0.838,0.559-1.299,0.559c-1.025,0-1.863-0.839-1.863-1.862c-0.467-0.374-0.838-0.932-0.933-1.583
          C376.979,354.653,376.979,354.563,376.979,354.471z"></path>
        <path fill="#8CB347" d="M378.096,358.659L378.096,358.659L378.096,358.659z"></path>
      </g>
    </g>
  </g>
  <g>
    <g>
      <g>
        <path fill="#8CB347" d="M153.65,358.473L153.65,358.473L153.65,358.473z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M153.65,358.473L153.65,358.473L153.65,358.473z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M160.638,352.791c-0.373-0.278-0.746-0.372-1.119-0.372c-0.372,0-0.837,0.188-1.118,0.559
          c-0.094,0.094-0.094,0.094-0.186,0.187h-0.094c-0.558,0-0.931,0.558-0.931,1.023c0,0.095,0,0.095,0,0.188
          c-0.094,0.093-0.279,0.187-0.373,0.278c-0.279,0.279-0.373,0.652-0.373,1.119c0,0.465,0.279,0.838,0.652,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.744,1.21,1.398,1.304l0,0l0,0c0.093,0,0.187,0.279,0.279,0.373
          c0.279,0.276,0.932,0.465,1.304,0.465s0.279-0.465,1.118-0.465l0,0c0,0,0-0.281,0.092-0.373h-0.092l0,0l0,0l0,0h0.092
          c0.373,0,0.746-0.188,1.025-0.559c0.279-0.374,0.373-0.744,0.373-1.119c0-0.186-0.092-0.373-0.186-0.559
          c0.186-0.279,0.186-0.558,0.186-0.838s-0.092-0.467-0.186-0.652c0.093-0.186,0.093-0.467,0.093-0.746
          c0-0.837-0.838-1.396-1.583-1.303C161.009,352.605,160.729,352.698,160.638,352.791z"></path>
        <path fill="#8CB347" d="M158.306,358.659L158.306,358.659L158.306,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M157.189,354.375L157.189,354.375c-0.187,0-0.279,0.093-0.373,0.188
          c-0.279,0.278-0.373,0.651-0.373,1.116s0.279,0.836,0.652,1.117c0,0.095,0,0.281,0,0.467c0,0.745,0.744,1.306,1.397,1.306
          c0,0,0,0,0,0.094l0,0c0.093,0.092,0.188,0.187,0.279,0.279c0.279,0.278,0.744,0.466,1.21,0.372c0.373,0,0.838-0.187,1.025-0.559
          l0,0c0.093-0.092,0.187-0.186,0.187-0.373l0,0l0,0l0,0l0,0h0.093c0.372,0,0.746-0.187,1.024-0.558
          c0.279-0.374,0.373-0.745,0.373-1.118c0-0.187-0.093-0.373-0.093-0.558c-0.187,0.651-0.745,1.117-1.397,1.303
          c-0.373,0.374-0.839,0.56-1.304,0.56c-1.025,0-1.862-0.837-1.862-1.861c-0.466-0.373-0.837-0.932-0.932-1.583
          C157.189,354.563,157.189,354.471,157.189,354.375z"></path>
        <path fill="#8CB347" d="M158.306,358.659L158.306,358.659L158.306,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M171.811,352.791c-0.373-0.278-0.745-0.372-1.119-0.372c-0.372,0-0.837,0.188-1.117,0.559
          c-0.093,0.094-0.093,0.094-0.186,0.187h-0.094c-0.558,0-0.931,0.558-0.931,1.023c0,0.095,0,0.095,0,0.188
          c-0.093,0.093-0.279,0.187-0.373,0.278c-0.279,0.279-0.373,0.652-0.373,1.119c0,0.465,0.279,0.838,0.652,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.745,1.21,1.397,1.304l0,0l0,0c0.094,0,0.188,0.279,0.279,0.373
          c0.279,0.276,0.931,0.465,1.304,0.465s0.279-0.465,1.119-0.465l0,0c0,0,0-0.281,0.092-0.373h-0.092l0,0l0,0l0,0h0.092
          c0.373,0,0.746-0.188,1.024-0.559c0.28-0.374,0.374-0.744,0.374-1.119c0-0.186-0.094-0.373-0.188-0.559
          c0.188-0.279,0.188-0.558,0.188-0.838s-0.094-0.467-0.188-0.652c0.094-0.186,0.094-0.467,0.094-0.746
          c0-0.837-0.839-1.396-1.583-1.303C172.09,352.513,171.811,352.698,171.811,352.791z"></path>
        <path fill="#8CB347" d="M169.577,358.659L169.577,358.659L169.577,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M168.271,354.471L168.271,354.471c-0.187,0-0.279,0.092-0.373,0.186c-0.28,0.278-0.373,0.65-0.373,1.118
          c0,0.467,0.279,0.837,0.652,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.746,1.303,1.398,1.303c0,0,0,0,0,0.095l0,0
          c0.093,0.093,0.187,0.188,0.279,0.278c0.279,0.281,0.744,0.467,1.21,0.373c0.373,0,0.838-0.188,1.024-0.559l0,0
          c0.094-0.093,0.187-0.188,0.187-0.374l0,0l0,0l0,0l0,0h0.094c0.372,0,0.744-0.185,1.024-0.558
          c0.279-0.373,0.373-0.743,0.373-1.116c0-0.188-0.094-0.373-0.094-0.558c-0.187,0.649-0.746,1.117-1.398,1.304
          c-0.372,0.372-0.838,0.559-1.303,0.559c-1.023,0-1.863-0.839-1.863-1.862c-0.466-0.374-0.838-0.932-0.931-1.583
          C168.366,354.653,168.271,354.563,168.271,354.471z"></path>
        <path fill="#8CB347" d="M169.577,358.659L169.577,358.659L169.577,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M182.986,352.791c-0.372-0.278-0.746-0.372-1.118-0.372c-0.373,0-0.838,0.188-1.119,0.559
          c-0.094,0.094-0.094,0.094-0.186,0.187h-0.094c-0.559,0-0.931,0.558-0.931,1.023c0,0.095,0,0.095,0,0.188
          c-0.094,0.093-0.279,0.187-0.374,0.278c-0.279,0.279-0.372,0.652-0.372,1.119c0,0.465,0.279,0.838,0.651,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.745,1.21,1.398,1.304l0,0l0,0c0.093,0,0.187,0.279,0.279,0.373
          c0.279,0.276,0.746,0.276,1.21,0.276c0.373,0,0.837-0.649,1.024-0.649l0,0c0.093,0,0.187-0.094,0.279-0.188l0.094,0.188l0,0l0,0
          l0,0h0.093c0.373,0,0.744-0.188,1.025-0.559c0.279-0.374,0.373-0.744,0.373-1.119c0-0.186-0.093-0.373-0.187-0.559
          c0.187-0.279,0.187-0.558,0.187-0.838s-0.093-0.467-0.187-0.652c0.094-0.186,0.094-0.467,0.094-0.746
          c0-0.837-0.838-1.397-1.583-1.303C183.359,352.605,183.082,352.698,182.986,352.791z"></path>
        <path fill="#8CB347" d="M180.659,358.659L180.659,358.659L180.659,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M179.542,354.375L179.542,354.375c-0.188,0-0.279,0.093-0.374,0.188
          c-0.279,0.278-0.372,0.651-0.372,1.116s0.279,0.836,0.652,1.117c0,0.095,0,0.281,0,0.467c0,0.745,0.744,1.306,1.397,1.306
          c0,0,0,0,0,0.094l0,0c0.093,0.092,0.187,0.187,0.279,0.279c0.279,0.278,0.746,0.466,1.21,0.372c0.373,0,0.837-0.187,1.025-0.559
          l0,0c0.093-0.092,0.187-0.186,0.187-0.373l0,0l0,0l0,0l0,0h0.092c0.373,0,0.746-0.187,1.025-0.558
          c0.279-0.374,0.372-0.745,0.372-1.118c0-0.187-0.092-0.373-0.092-0.558c-0.188,0.651-0.746,1.117-1.397,1.303
          c-0.373,0.374-0.839,0.56-1.305,0.56c-1.024,0-1.862-0.837-1.862-1.861c-0.466-0.373-0.838-0.932-0.931-1.583
          C179.542,354.563,179.542,354.471,179.542,354.375z"></path>
        <path fill="#8CB347" d="M180.659,358.659L180.659,358.659L180.659,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M194.069,352.698c-0.372-0.28-0.745-0.373-1.12-0.373c-0.373,0-0.838,0.188-1.118,0.558
          c-0.092,0.094-0.092,0.094-0.186,0.188h-0.093c-0.559,0-0.932,0.559-0.932,1.023c0,0.093,0,0.093,0,0.188
          c-0.094,0.093-0.28,0.186-0.373,0.278c-0.279,0.279-0.374,0.652-0.374,1.117s0.28,0.838,0.652,1.119c0,0.093,0,0.279,0,0.466
          c0,0.744,0.746,1.21,1.398,1.305l0,0l0,0c0.094,0,0.187,0.278,0.278,0.373c0.28,0.278,0.743,0.278,1.211,0.278
          c0.373,0,0.837-0.651,1.022-0.651l0,0c0.091,0,0.189-0.095,0.282-0.186l0.09,0.186l0,0c0,0-0.09,0,0,0l0,0h0.093
          c0.372,0,0.74-0.186,1.024-0.56c0.279-0.373,0.367-0.745,0.367-1.116c0-0.188-0.088-0.373-0.186-0.56
          c0.186-0.279,0.186-0.558,0.186-0.837s-0.088-0.466-0.186-0.652c0.092-0.187,0.092-0.467,0.092-0.745
          c0-0.838-0.843-1.397-1.583-1.304C194.442,352.513,194.164,352.605,194.069,352.698z"></path>
        <path fill="#8CB347" d="M191.835,358.567L191.835,358.567L191.835,358.567z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M190.625,354.471L190.625,354.471c-0.187,0-0.279,0.092-0.373,0.186
          c-0.279,0.278-0.372,0.65-0.372,1.118c0,0.467,0.279,0.837,0.652,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.745,1.303,1.397,1.303
          c0,0,0,0,0,0.095l0,0c0.094,0.093,0.188,0.188,0.28,0.278c0.279,0.281,0.741,0.467,1.21,0.373c0.373,0,0.837-0.188,1.025-0.559
          l0,0c0.089-0.093,0.187-0.188,0.187-0.374l0,0l0,0l0,0l0,0h0.092c0.369,0,0.741-0.185,1.021-0.558
          c0.28-0.373,0.372-0.743,0.372-1.116c0-0.188-0.092-0.373-0.092-0.558c-0.187,0.649-0.741,1.117-1.398,1.304
          c-0.372,0.372-0.838,0.559-1.304,0.559c-1.023,0-1.862-0.839-1.862-1.862c-0.466-0.374-0.838-0.932-0.932-1.583
          C190.717,354.653,190.625,354.563,190.625,354.471z"></path>
        <path fill="#8CB347" d="M191.835,358.567L191.835,358.567L191.835,358.567z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M205.337,352.791c-0.37-0.278-0.744-0.372-1.118-0.372c-0.372,0-0.841,0.188-1.12,0.559
          c-0.09,0.094-0.09,0.094-0.188,0.187h-0.092c-0.56,0-0.932,0.558-0.932,1.023c0,0.095,0,0.095,0,0.188
          c-0.092,0.093-0.279,0.187-0.372,0.278c-0.279,0.279-0.369,0.652-0.369,1.119c0,0.465,0.279,0.838,0.648,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.744,1.21,1.4,1.304l0,0l0,0c0.093,0,0.188,0.279,0.281,0.373
          c0.279,0.276,0.743,0.276,1.21,0.276c0.372,0,0.839-0.649,1.024-0.649l0,0c0.089,0,0.188-0.094,0.279-0.188l0.094,0.188l0,0l0,0
          l0,0h0.089c0.373,0,0.743-0.188,1.022-0.559c0.282-0.374,0.374-0.744,0.374-1.119c0-0.186-0.091-0.373-0.19-0.559
          c0.19-0.279,0.19-0.558,0.19-0.838s-0.091-0.467-0.19-0.652c0.094-0.186,0.094-0.467,0.094-0.746
          c0-0.837-0.84-1.397-1.583-1.303C205.711,352.605,205.432,352.698,205.337,352.791z"></path>
        <path fill="#8CB347" d="M203.01,358.659L203.01,358.659L203.01,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M201.893,354.375L201.893,354.375c-0.187,0-0.279,0.093-0.372,0.188
          c-0.279,0.278-0.369,0.651-0.369,1.116s0.279,0.836,0.652,1.117c0,0.095,0,0.281,0,0.467c0,0.745,0.741,1.306,1.396,1.306
          c0,0,0,0,0,0.094l0,0c0.093,0.092,0.188,0.187,0.28,0.279c0.279,0.278,0.744,0.466,1.211,0.372c0.371,0,0.838-0.187,1.023-0.559
          l0,0c0.093-0.092,0.188-0.186,0.188-0.373l0,0l0,0l0,0l0,0h0.091c0.374,0,0.743-0.187,1.025-0.558
          c0.279-0.374,0.368-0.745,0.368-1.118c0-0.187-0.089-0.373-0.089-0.558c-0.19,0.651-0.744,1.117-1.401,1.303
          c-0.373,0.374-0.839,0.56-1.304,0.56c-1.02,0-1.858-0.837-1.858-1.861c-0.467-0.373-0.842-0.932-0.931-1.583
          C201.893,354.563,201.893,354.471,201.893,354.375z"></path>
        <path fill="#8CB347" d="M203.01,358.659L203.01,358.659L203.01,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M216.42,352.791c-0.37-0.278-0.743-0.372-1.116-0.372c-0.375,0-0.843,0.188-1.122,0.559
          c-0.094,0.094-0.094,0.094-0.188,0.187h-0.092c-0.56,0-0.932,0.558-0.932,1.023c0,0.095,0,0.095,0,0.188
          c-0.092,0.093-0.279,0.187-0.372,0.278c-0.279,0.279-0.369,0.652-0.369,1.119c0,0.465,0.279,0.838,0.648,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.745,1.21,1.401,1.304l0,0l0,0c0.092,0,0.188,0.279,0.28,0.373
          c0.28,0.276,0.931,0.372,1.303,0.372c0.373,0,0.279-0.095,1.21-0.652l0,0c0,0,0-0.092,0.094-0.278l0,0l0,0h-0.094l0,0h0.094
          c0.368,0,0.741-0.186,1.02-0.559c0.279-0.372,0.372-0.745,0.372-1.118c0-0.188-0.093-0.374-0.187-0.558
          c0.187-0.281,0.187-0.559,0.187-0.839c0-0.279-0.093-0.466-0.187-0.65c0.088-0.188,0.088-0.467,0.088-0.745
          c0-0.84-0.837-1.397-1.583-1.304C216.886,352.513,216.514,352.698,216.42,352.791z"></path>
        <path fill="#8CB347" d="M214.186,358.659L214.186,358.659L214.186,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M213.068,354.471L213.068,354.471c-0.19,0-0.279,0.092-0.371,0.186c-0.281,0.278-0.372,0.65-0.372,1.118
          c0,0.467,0.279,0.837,0.651,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.745,1.303,1.401,1.303c0,0,0,0,0,0.095l0,0
          c0.09,0.093,0.188,0.188,0.28,0.278c0.279,0.281,0.741,0.467,1.21,0.373c0.373,0,0.84-0.188,1.02-0.559l0,0
          c0.094-0.093,0.19-0.188,0.19-0.374l0,0l0,0l0,0l0,0h0.094c0.368,0,0.741-0.185,1.02-0.558c0.279-0.373,0.373-0.743,0.373-1.116
          c0-0.188-0.094-0.373-0.094-0.558c-0.187,0.649-0.741,1.117-1.398,1.304c-0.371,0.372-0.837,0.559-1.302,0.559
          c-1.025,0-1.864-0.839-1.864-1.862c-0.465-0.374-0.839-0.932-0.931-1.583C212.975,354.653,212.975,354.563,213.068,354.471z"></path>
        <path fill="#8CB347" d="M214.186,358.659L214.186,358.659L214.186,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M227.689,352.791c-0.368-0.278-0.741-0.372-1.119-0.372c-0.37,0-0.837,0.188-1.116,0.559
          c-0.094,0.094-0.094,0.094-0.19,0.187h-0.094c-0.558,0-0.931,0.558-0.931,1.023c0,0.095,0,0.095,0,0.188
          c-0.089,0.093-0.279,0.187-0.368,0.278c-0.28,0.279-0.373,0.652-0.373,1.119c0,0.465,0.279,0.838,0.652,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.741,1.21,1.398,1.304l0,0l0,0c0.091,0,0.19,0.279,0.279,0.373
          c0.279,0.276,1.025,0.558,1.304,0.465c0.371,0,0.279-0.559,1.118-0.465l0,0c0,0,0-0.281,0.092-0.373l0,0l0,0h-0.092l0,0h0.092
          c0.372,0,0.744-0.188,1.024-0.559c0.279-0.374,0.372-0.744,0.372-1.119c0-0.186-0.093-0.373-0.19-0.559
          c0.19-0.279,0.19-0.558,0.19-0.838s-0.093-0.467-0.19-0.652c0.093-0.186,0.093-0.467,0.093-0.746
          c0-0.837-0.839-1.396-1.582-1.303C228.063,352.605,227.785,352.698,227.689,352.791z"></path>
        <path fill="#8CB347" d="M225.361,358.659L225.361,358.659L225.361,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M224.245,354.375L224.245,354.375c-0.191,0-0.283,0.093-0.372,0.188
          c-0.28,0.278-0.373,0.651-0.373,1.116s0.28,0.836,0.652,1.117c0,0.095,0,0.281,0,0.467c0,0.745,0.741,1.306,1.398,1.306
          c0,0,0,0,0,0.094l0,0c0.091,0.092,0.19,0.187,0.279,0.279c0.283,0.278,0.744,0.466,1.21,0.372c0.373,0,0.842-0.187,1.025-0.559
          l0,0c0.091-0.092,0.19-0.186,0.19-0.373l0,0l0,0l0,0l0,0h0.089c0.373,0,0.743-0.187,1.024-0.558
          c0.28-0.374,0.372-0.745,0.372-1.118c0-0.187-0.091-0.373-0.091-0.558c-0.188,0.651-0.745,1.117-1.398,1.303
          c-0.373,0.374-0.842,0.56-1.305,0.56c-1.022,0-1.862-0.837-1.862-1.861c-0.467-0.373-0.838-0.932-0.931-1.583
          C224.245,354.563,224.245,354.471,224.245,354.375z"></path>
        <path fill="#8CB347" d="M225.361,358.659L225.361,358.659L225.361,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M238.772,352.698c-0.372-0.28-0.741-0.373-1.118-0.373c-0.372,0-0.839,0.188-1.118,0.558
          c-0.093,0.094-0.093,0.094-0.19,0.188h-0.094c-0.558,0-0.931,0.559-0.931,1.023c0,0.093,0,0.093,0,0.188
          c-0.089,0.093-0.279,0.186-0.368,0.278c-0.279,0.279-0.374,0.652-0.374,1.117s0.28,0.838,0.652,1.119c0,0.093,0,0.279,0,0.466
          c0,0.744,0.741,1.21,1.398,1.305l0,0l0,0c0.093,0,0.19,0.278,0.279,0.373c0.28,0.278,0.931,0.372,1.304,0.372
          c0.372,0,0.279-0.093,1.21-0.652l0,0c0,0,0-0.093,0.093-0.278l0,0l0,0h-0.093l0,0h0.093c0.372,0,0.741-0.188,1.02-0.558
          c0.283-0.374,0.373-0.746,0.373-1.12c0-0.188-0.09-0.373-0.188-0.559c0.188-0.278,0.188-0.558,0.188-0.838
          c0-0.277-0.09-0.466-0.188-0.65c0.09-0.186,0.09-0.468,0.09-0.745c0-0.837-0.839-1.398-1.581-1.302
          C239.238,352.513,238.866,352.605,238.772,352.698z"></path>
        <path fill="#8CB347" d="M236.536,358.567L236.536,358.567L236.536,358.567z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M235.42,354.471L235.42,354.471c-0.188,0-0.279,0.092-0.373,0.186c-0.279,0.278-0.368,0.65-0.368,1.118
          c0,0.467,0.279,0.837,0.648,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.743,1.303,1.401,1.303c0,0,0,0,0,0.095l0,0
          c0.092,0.093,0.186,0.188,0.28,0.278c0.279,0.281,0.743,0.467,1.21,0.373c0.372,0,0.839-0.188,1.022-0.559l0,0
          c0.091-0.093,0.188-0.188,0.188-0.374l0,0l0,0l0,0l0,0h0.092c0.372,0,0.741-0.185,1.021-0.558
          c0.283-0.373,0.373-0.743,0.373-1.116c0-0.188-0.09-0.373-0.09-0.558c-0.19,0.649-0.745,1.117-1.401,1.304
          c-0.372,0.372-0.838,0.559-1.303,0.559c-1.021,0-1.864-0.839-1.864-1.862c-0.466-0.374-0.837-0.932-0.93-1.583
          C235.326,354.653,235.326,354.563,235.42,354.471z"></path>
        <path fill="#8CB347" d="M236.536,358.567L236.536,358.567L236.536,358.567z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M250.04,352.791c-0.371-0.278-0.744-0.372-1.121-0.372c-0.372,0-0.838,0.188-1.118,0.559
          c-0.093,0.094-0.093,0.094-0.191,0.187h-0.09c-0.561,0-0.931,0.558-0.931,1.023c0,0.095,0,0.095,0,0.188
          c-0.091,0.093-0.279,0.187-0.372,0.278c-0.279,0.279-0.371,0.652-0.371,1.119c0,0.465,0.279,0.838,0.652,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.742,1.21,1.4,1.304l0,0l0,0c0.089,0,0.187,0.279,0.28,0.373
          c0.278,0.276,0.741,0.276,1.118,0.276s0.931-0.649,1.024-0.649l0,0c0,0.931,0.28-0.094,0.28-0.188l0.089,0.095l0,0l0,0l0,0
          h0.092c0.372,0,0.745-0.188,1.024-0.56c0.279-0.373,0.369-0.744,0.369-1.118c0-0.187-0.09-0.373-0.187-0.558
          c0.187-0.279,0.187-0.558,0.187-0.837s-0.09-0.467-0.187-0.652c0.091-0.188,0.091-0.466,0.091-0.746
          c0-0.836-0.84-1.396-1.582-1.303C250.414,352.605,250.135,352.698,250.04,352.791z"></path>
        <path fill="#8CB347" d="M247.713,358.659L247.713,358.659L247.713,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M246.595,354.375L246.595,354.375c-0.189,0-0.279,0.093-0.37,0.188c-0.28,0.278-0.373,0.651-0.373,1.116
          s0.279,0.836,0.652,1.117c0,0.095,0,0.281,0,0.467c0,0.745,0.744,1.306,1.401,1.306c0,0,0,0,0,0.094l0,0
          c0.089,0.092,0.187,0.187,0.279,0.279c0.279,0.278,0.741,0.466,1.21,0.372c0.371,0,0.84-0.187,1.021-0.559l0,0
          c0.093-0.092,0.191-0.186,0.191-0.373l0,0l0,0l0,0l0,0h0.09c0.372,0,0.743-0.187,1.022-0.558
          c0.281-0.374,0.372-0.745,0.372-1.118c0-0.187-0.091-0.373-0.091-0.558c-0.188,0.651-0.743,1.117-1.398,1.303
          c-0.374,0.374-0.839,0.56-1.304,0.56c-1.023,0-1.861-0.837-1.861-1.861c-0.466-0.373-0.84-0.932-0.932-1.583
          C246.595,354.563,246.595,354.471,246.595,354.375z"></path>
        <path fill="#8CB347" d="M247.713,358.659L247.713,358.659L247.713,358.659z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M261.125,352.791c-0.372-0.278-0.745-0.372-1.122-0.372c-0.372,0-0.838,0.188-1.118,0.559
          c-0.093,0.094-0.093,0.094-0.19,0.187h-0.091c-0.562,0-0.931,0.558-0.931,1.023c0,0.095,0,0.095,0,0.188
          c-0.091,0.093-0.282,0.187-0.372,0.278c-0.28,0.279-0.372,0.652-0.372,1.119c0,0.465,0.279,0.838,0.652,1.118
          c0,0.093,0,0.278,0,0.467c0,0.743,0.741,1.21,1.396,1.304l0,0l0,0c0.093,0,0.19,0.279,0.283,0.373
          c0.279,0.276,0.741,0.276,1.21,0.276c0.369,0,0.839-0.649,1.021-0.649l0,0c0.091,0,0.19-0.094,0.279-0.188l0.092,0.188l0,0l0,0
          l0,0h0.093c0.368,0,0.741-0.188,1.02-0.559c0.19-0.374,0.374-0.744,0.374-1.119c0-0.186-0.092-0.373-0.188-0.559
          c0.188-0.279,0.188-0.558,0.188-0.838s-0.092-0.467-0.188-0.652c0.091-0.186,0.091-0.467,0.091-0.746
          c0-0.837-0.84-1.397-1.582-1.303C261.59,352.513,261.217,352.698,261.125,352.791z"></path>
        <path fill="#8CB347" d="M258.889,358.659L258.889,358.659L258.889,358.659z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M257.771,354.471L257.771,354.471c-0.187,0-0.279,0.092-0.369,0.186
          c-0.279,0.278-0.372,0.65-0.372,1.118c0,0.467,0.279,0.837,0.651,1.117c0,0.093,0,0.28,0,0.468c0,0.745,0.742,1.303,1.397,1.303
          c0,0,0,0,0,0.095l0,0c0.093,0.093,0.191,0.188,0.281,0.278c0.28,0.281,0.743,0.467,1.21,0.373c0.372,0,0.841-0.188,1.024-0.559
          l0,0c0.092-0.093,0.189-0.188,0.189-0.374l0,0l0,0l0,0l0,0h0.091c0.371,0,0.744-0.185,1.022-0.558
          c0.279-0.373,0.374-0.743,0.374-1.116c0-0.188,0-0.373-0.094-0.558c-0.189,0.649-0.744,1.117-1.401,1.304
          c-0.368,0.372-0.837,0.559-1.3,0.559c-1.024,0-1.863-0.839-1.863-1.862c-0.467-0.374-0.84-0.932-0.931-1.583
          C257.677,354.653,257.771,354.563,257.771,354.471z"></path>
        <path fill="#8CB347" d="M258.889,358.659L258.889,358.659L258.889,358.659z"></path>
      </g>
    </g>
  </g>
  <g>
    <g>
      <g>
        <path fill="#8CB347" d="M230.391,433.444c-0.186,0.186-0.186,0.467-0.186,0.649c0,0.279,0.092,0.466,0.279,0.651l0.092,0.092
          c0,0,0,0,0,0.094c0,0.277,0.281,0.466,0.56,0.466h0.092c0,0.091,0.089,0.091,0.187,0.188c0.19,0.185,0.372,0.185,0.652,0.185
          c0.279,0,0.467-0.185,0.65-0.367c0.093,0,0.188,0,0.28,0c0.372,0,0.839-0.373,0.839-0.842h0.091l0,0c0,0,0-0.091,0.094-0.188
          c0.188-0.188,0.188-0.468,0.188-0.742c0-0.188-0.282-0.648-0.282-0.648l0,0c0,0-0.185,0-0.185-0.097v0.097l0,0l0,0l0,0v-0.097
          c0-0.185-0.094-0.467-0.284-0.559c-0.185-0.187-0.368-0.187-0.648-0.187c-0.093,0-0.189,0-0.372,0.089
          c-0.19-0.089-0.279-0.089-0.467-0.089c-0.187,0-0.279,0-0.369,0.089c-0.092-0.089-0.283-0.089-0.371-0.089
          c-0.467,0-0.745,0.467-0.745,0.931C230.298,433.164,230.298,433.257,230.391,433.444z"></path>
        <path fill="#8CB347" d="M233.744,434.469L233.744,434.469L233.744,434.469z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M231.322,435.305L231.322,435.305c0,0.096,0,0.188,0.093,0.188c0.19,0.188,0.372,0.188,0.652,0.188
          c0.279,0,0.467-0.188,0.65-0.366c0.093,0,0.188,0,0.279,0c0.373,0,0.746-0.372,0.746-0.844l0,0l0,0
          c0.089,0,0.089-0.088,0.185-0.19c0.188-0.187,0.282-0.466,0.188-0.649c0-0.187-0.089-0.467-0.279-0.561l0,0
          c-0.089-0.088-0.089-0.088-0.188-0.088l0,0l0,0l0,0l0,0v-0.097c0-0.185-0.091-0.466-0.279-0.558
          c-0.19-0.188-0.373-0.188-0.652-0.188c-0.091,0-0.19,0-0.279,0.093c0.372,0.093,0.652,0.468,0.741,0.838
          c0.19,0.189,0.279,0.468,0.279,0.744c0,0.559-0.466,1.022-1.02,1.118C232.253,435.118,231.88,435.212,231.322,435.305
          C231.415,435.305,231.415,435.305,231.322,435.305z"></path>
        <path fill="#8CB347" d="M233.744,434.469L233.744,434.469L233.744,434.469z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M230.391,439.59c-0.186,0.186-0.186,0.468-0.186,0.651c0,0.28,0.092,0.465,0.279,0.652l0.092,0.091
          c0,0,0,0,0,0.093c0,0.28,0.281,0.465,0.56,0.465h0.092c0,0.091,0.089,0.091,0.187,0.188c0.19,0.188,0.372,0.188,0.652,0.188
          c0.279-0.092,0.467-0.188,0.65-0.372c0.093,0,0.188,0,0.28,0c0.372,0,0.839-0.373,0.839-0.841h0.091l0,0
          c0,0,0-0.091,0.094-0.186c0.188-0.189,0.188-0.746,0.188-1.026c0-0.188-0.282-0.931-0.282-0.931l0,0c0,0-0.185,0-0.185-0.09
          v0.09l0,0v0.281v0.188l0,0c0-0.188-0.094-0.369-0.284-0.56c-0.185-0.188-0.368-0.188-0.648-0.188c-0.093,0-0.189,0-0.372,0.09
          c-0.19-0.09-0.279-0.09-0.467-0.09c-0.187,0-0.279,0.09-0.369,0.09c-0.092-0.09-0.283-0.09-0.371-0.09
          c-0.467,0-0.745,0.467-0.745,0.931C230.391,439.405,230.298,439.494,230.391,439.59z"></path>
        <path fill="#8CB347" d="M233.744,440.706L233.744,440.706L233.744,440.706z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M231.415,441.453L231.415,441.453c0,0.092,0,0.185,0.093,0.185c0.188,0.192,0.372,0.192,0.652,0.192
          c0.279,0,0.466-0.192,0.651-0.37c0.09,0,0.186,0,0.28,0c0.368,0,0.741-0.372,0.741-0.842l0,0l0,0c0.091,0,0.091-0.09,0.19-0.189
          c0.188-0.188,0.279-0.466,0.188-0.653c0-0.186-0.094-0.466-0.282-0.559l0,0c-0.091-0.089-0.091-0.089-0.185-0.089l0,0l0,0l0,0
          l0,0v-0.093c0-0.19-0.094-0.466-0.284-0.559c-0.187-0.19-0.368-0.19-0.648-0.19c-0.093,0-0.189,0-0.279,0.092
          c0.369,0.093,0.648,0.467,0.741,0.839c0.187,0.191,0.28,0.467,0.28,0.744c0,0.561-0.466,1.023-1.021,1.118
          C232.253,441.359,231.88,441.545,231.415,441.453C231.509,441.453,231.509,441.453,231.415,441.453z"></path>
        <path fill="#8CB347" d="M233.744,440.706L233.744,440.706L233.744,440.706z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M230.391,445.829c-0.186,0.188-0.186,0.465-0.186,0.653c0,0.275,0.092,0.465,0.279,0.649l0.092,0.093
          c0,0,0,0,0,0.089c0,0.279,0.281,0.468,0.56,0.468h0.092c0,0.091,0.089,0.091,0.187,0.188c0.19,0.19,0.372,0.19,0.652,0.19
          c0.279,0,0.467-0.19,0.65-0.373c0.093,0,0.188,0,0.28,0c0.372,0,0.839-0.369,0.839-0.839h0.091l0,0c0,0,0-0.093,0.094-0.188
          c0.188-0.188,0.188-0.651,0.188-0.841c0-0.188-0.282-0.838-0.282-0.838l0,0c0,0-0.185,0-0.185-0.093v0.093l0,0v0.092v0.091l0,0
          c0-0.188-0.094-0.466-0.284-0.561c-0.185-0.188-0.368-0.188-0.648-0.188c-0.093,0-0.189,0-0.372,0.093
          c-0.19-0.093-0.279-0.093-0.467-0.093c-0.187,0-0.279,0-0.369,0.093c-0.092-0.093-0.283-0.093-0.371-0.093
          c-0.467,0-0.745,0.466-0.745,0.931C230.298,445.551,230.298,445.643,230.391,445.829z"></path>
        <path fill="#8CB347" d="M233.837,447.04L233.837,447.04L233.837,447.04z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M231.322,447.783L231.322,447.783c0,0.096,0,0.188,0.093,0.188c0.19,0.188,0.372,0.188,0.652,0.188
          c0.279,0,0.467-0.188,0.65-0.373c0.093,0,0.188,0,0.279,0c0.373,0,0.746-0.366,0.746-0.836l0,0l0,0
          c0.089,0,0.089-0.097,0.185-0.188c0.188-0.188,0.282-0.467,0.188-0.652c0-0.188-0.089-0.468-0.279-0.56l0,0
          c-0.089-0.093-0.089-0.093-0.188-0.093l0,0l0,0l0,0l0,0v-0.093c0-0.188-0.091-0.466-0.279-0.56
          c-0.19-0.188-0.373-0.188-0.652-0.188c-0.091,0-0.19,0-0.279,0.093c0.372,0.093,0.652,0.466,0.741,0.839
          c0.19,0.188,0.279,0.465,0.279,0.743c0,0.559-0.466,1.021-1.02,1.119C232.161,447.506,231.788,447.783,231.322,447.783
          C231.415,447.783,231.415,447.783,231.322,447.783z"></path>
        <path fill="#8CB347" d="M233.837,447.04L233.837,447.04L233.837,447.04z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M230.483,452.069c-0.187,0.186-0.187,0.466-0.187,0.649c0,0.28,0.089,0.467,0.279,0.65l0.093,0.092
          c0,0,0,0,0,0.093c0,0.28,0.279,0.466,0.559,0.466h0.089c0,0.094,0.093,0.094,0.191,0.19c0.188,0.188,0.372,0.188,0.652,0.188
          c0.279,0,0.466-0.188,0.651-0.371c0.09,0,0.186,0,0.28,0c0.368,0,0.837-0.37,0.837-0.841h0.094l0,0c0,0,0-0.091,0.089-0.187
          c0.19-0.189,0.19-0.466,0.19-0.745c0-0.186-0.279-0.65-0.279-0.65l0,0c0,0-0.19,0-0.19-0.09v0.09l0,0l0,0l0,0v-0.09
          c0-0.19-0.089-0.467-0.279-0.563c-0.188-0.188-0.373-0.188-0.652-0.188c-0.09,0-0.188,0-0.372,0.094
          c-0.188-0.094-0.28-0.094-0.466-0.094c-0.188,0-0.28,0.094-0.372,0.094c-0.092-0.094-0.28-0.094-0.373-0.094
          c-0.466,0-0.741,0.465-0.741,0.932C230.298,451.789,230.391,451.977,230.483,452.069z"></path>
        <path fill="#8CB347" d="M233.837,453.094L233.837,453.094L233.837,453.094z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M231.415,453.932C231.415,453.932,231.415,454.024,231.415,453.932c0,0.09,0,0.187,0.093,0.187
          c0.188,0.188,0.372,0.188,0.652,0.188c0.279,0,0.466-0.188,0.651-0.369c0.09,0,0.186,0,0.28,0c0.368,0,0.741-0.371,0.741-0.842
          l0,0l0,0c0.091,0,0.091-0.093,0.19-0.188c0.188-0.188,0.279-0.466,0.188-0.653c0-0.186-0.094-0.466-0.282-0.559l0,0
          c-0.091-0.093-0.091-0.093-0.185-0.093l0,0l0,0l0,0l0,0v-0.09c0-0.19-0.094-0.467-0.284-0.563
          c-0.187-0.188-0.368-0.188-0.648-0.188c-0.093,0-0.189,0-0.279,0.094c0.369,0.092,0.648,0.465,0.741,0.838
          c0.187,0.188,0.28,0.466,0.28,0.746c0,0.558-0.466,1.02-1.021,1.115C232.161,453.744,231.88,453.839,231.415,453.932
          C231.509,453.932,231.509,453.932,231.415,453.932z"></path>
        <path fill="#8CB347" d="M233.837,453.094L233.837,453.094L233.837,453.094z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M230.483,458.215c-0.187,0.188-0.187,0.466-0.187,0.652c0,0.279,0.089,0.465,0.279,0.647l0.093,0.095
          c0,0,0,0,0,0.092c0,0.278,0.279,0.465,0.559,0.465h0.089c0,0.093,0.093,0.093,0.191,0.19c0.188,0.188,0.372,0.188,0.652,0.188
          c0.279,0,0.466-0.188,0.651-0.372c0.09,0,0.186,0,0.28,0c0.368,0,0.837-0.369,0.837-0.84h0.094l0,0c0,0,0-0.092,0.089-0.186
          c0.19-0.191,0.19-0.744,0.19-1.023c0-0.188-0.279-0.932-0.279-0.932l0,0c0,0-0.19,0-0.19-0.094v0.094l0,0v0.278v0.188l0,0
          c0-0.189-0.089-0.372-0.279-0.563c-0.188-0.188-0.373-0.188-0.652-0.188c-0.09,0-0.188,0-0.372,0.092
          c-0.188-0.092-0.28-0.092-0.466-0.092c-0.188,0-0.28,0.092-0.372,0.092c-0.092-0.092-0.28-0.092-0.373-0.092
          c-0.466,0-0.741,0.465-0.741,0.932C230.391,458.03,230.391,458.123,230.483,458.215z"></path>
        <path fill="#8CB347" d="M233.837,459.332L233.837,459.332L233.837,459.332z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M231.322,460.172L231.322,460.172c0,0.091,0,0.189,0.093,0.189c0.19,0.188,0.372,0.188,0.652,0.188
          c0.279,0,0.467-0.188,0.65-0.373c0.093,0,0.188,0,0.279,0c0.373,0,0.746-0.37,0.746-0.839l0,0l0,0
          c0.089,0,0.089-0.093,0.185-0.188c0.188-0.189,0.282-0.468,0.188-0.65c0-0.191-0.089-0.468-0.279-0.56l0,0
          c-0.089-0.094-0.089-0.094-0.188-0.094l0,0l0,0l0,0l0,0v-0.093c0-0.187-0.091-0.466-0.279-0.559
          c-0.19-0.188-0.373-0.188-0.652-0.188c-0.091,0-0.19,0-0.279,0.09c0.372,0.094,0.652,0.468,0.741,0.843
          c0.19,0.187,0.279,0.465,0.279,0.739c0,0.561-0.466,1.023-1.02,1.122C232.161,459.984,231.788,460.172,231.322,460.172
          C231.415,460.172,231.415,460.172,231.322,460.172z"></path>
        <path fill="#8CB347" d="M233.837,459.332L233.837,459.332L233.837,459.332z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M230.391,464.362c-0.186,0.188-0.186,0.466-0.186,0.651c0,0.278,0.092,0.465,0.279,0.648l0.092,0.092
          c0,0,0,0,0,0.093c0,0.279,0.281,0.467,0.56,0.467h0.092c0,0.093,0.089,0.093,0.187,0.188c0.19,0.188,0.372,0.188,0.652,0.188
          c0.279-0.094,0.467-0.188,0.65-0.371c0.093,0,0.188,0,0.28,0c0.372,0,0.839-0.37,0.839-0.841h0.091l0,0c0,0,0-0.092,0.094-0.188
          c0.188-0.19,0.188-0.19,0.188-0.372c0-0.188-0.188-0.371-0.188-0.371l0,0c0,0-0.19,0-0.19-0.093v0.093l0,0c0,0,0-0.279,0-0.373
          v-0.188c0,0,0-0.093,0-0.189c0-0.188-0.089-0.465-0.279-0.647c-0.188-0.188-0.373-0.279-0.652-0.279
          c-0.09,0-0.188,0-0.372,0.089c-0.188-0.089-0.28-0.089-0.466-0.089c-0.188,0-0.28,0-0.372,0.089
          c-0.092-0.089-0.28-0.089-0.373-0.089c-0.466,0-0.741,0.466-0.741,0.928C230.298,464.176,230.298,464.271,230.391,464.362z"></path>
        <path fill="#8CB347" d="M233.744,465.667L233.744,465.667L233.744,465.667z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M231.322,466.319L231.322,466.319c0,0.092,0,0.188,0.093,0.188c0.19,0.188,0.372,0.188,0.652,0.188
          c0.279,0,0.467-0.188,0.65-0.372c0.093,0,0.188,0,0.279,0c0.373,0,0.746-0.37,0.746-0.839l0,0l0,0
          c0.089,0,0.089-0.094,0.185-0.188c0.188-0.188,0.282-0.467,0.188-0.651c0-0.188-0.089-0.468-0.279-0.558l0,0
          c-0.089-0.095-0.089-0.095-0.188-0.095l0,0l0,0l0,0l0,0V463.9c0-0.188-0.091-0.466-0.279-0.561
          c-0.19-0.186-0.373-0.186-0.652-0.186c-0.091,0-0.19,0-0.279,0.088c0.372,0.093,0.652,0.468,0.741,0.844
          c0.19,0.186,0.279,0.465,0.279,0.74c0,0.56-0.466,1.022-1.02,1.121C232.253,466.132,231.788,466.411,231.322,466.319
          C231.415,466.411,231.415,466.411,231.322,466.319z"></path>
        <path fill="#8CB347" d="M233.744,465.667L233.744,465.667L233.744,465.667z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M230.391,470.696c-0.186,0.185-0.186,0.466-0.186,0.647c0,0.282,0.092,0.467,0.279,0.652l0.092,0.095
          c0,0,0,0,0,0.088c0,0.279,0.281,0.469,0.56,0.469h0.092c0,0.09,0.089,0.09,0.187,0.188c0.19,0.19,0.372,0.19,0.652,0.19
          c0.279-0.095,0.467-0.19,0.65-0.373c0.093,0,0.188,0,0.28,0c0.372,0,0.839-0.372,0.839-0.839h0.091l0,0c0,0,0-0.094,0.094-0.189
          c0.188-0.188,0.188-0.465,0.188-0.742c0-0.188-0.282-0.649-0.282-0.649l0,0c0,0-0.185,0-0.185-0.095v0.095l0,0l0,0l0,0v-0.095
          c0-0.187-0.094-0.467-0.284-0.558c-0.185-0.191-0.368-0.191-0.648-0.191c-0.093,0-0.189,0-0.372,0.092
          c-0.19-0.092-0.279-0.092-0.467-0.092c-0.187,0-0.279,0-0.369,0.092c-0.092-0.092-0.283-0.092-0.371-0.092
          c-0.467,0-0.745,0.468-0.745,0.933C230.298,470.417,230.298,470.602,230.391,470.696z"></path>
        <path fill="#8CB347" d="M233.837,471.905L233.837,471.905L233.837,471.905z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M231.415,472.557C231.322,472.651,231.322,472.651,231.415,472.557c0,0.094,0,0.188,0.093,0.188
          c0.188,0.188,0.372,0.188,0.652,0.188c0.279-0.091,0.466-0.188,0.651-0.369c0.09,0,0.186,0,0.28,0
          c0.368,0,0.741-0.373,0.741-0.842l0,0l0,0c0.091,0,0.091-0.09,0.19-0.188c0.188-0.188,0.279-0.466,0.188-0.652
          c0-0.185-0.094-0.465-0.282-0.558l0,0c-0.091-0.09-0.091-0.09-0.185-0.09l0,0l0,0l0,0l0,0v-0.094
          c0-0.19-0.094-0.468-0.284-0.559c-0.187-0.19-0.368-0.19-0.648-0.19c-0.093,0-0.189,0-0.279,0.093
          c0.369,0.093,0.648,0.465,0.741,0.84c0.187,0.188,0.28,0.466,0.28,0.743c0,0.559-0.466,1.021-1.021,1.117
          C232.253,472.372,231.788,472.651,231.415,472.557C231.415,472.651,231.415,472.651,231.415,472.557z"></path>
        <path fill="#8CB347" d="M233.837,471.905L233.837,471.905L233.837,471.905z"></path>
      </g>
    </g>
  </g>
  <g>
    <g>
      <g>
        <path fill="#8CB347" d="M195.651,436.236c-0.089,0.187-0.089,0.465,0,0.651c0.094,0.187,0.283,0.373,0.467,0.466
          c0.093,0,0.093,0,0.187,0c0,0,0,0,0,0.093c0.093,0.28,0.467,0.374,0.745,0.28c0,0,0.092,0,0.092-0.093
          c0.089,0.093,0.089,0.093,0.188,0.093c0.186,0.094,0.467,0.094,0.649,0c0.282-0.093,0.373-0.28,0.466-0.562
          c0.093,0,0.19,0,0.284-0.092c0.368-0.187,0.647-0.651,0.558-1.116l0.089-0.093l0,0c0,0,0-0.091,0-0.188
          c0.094-0.188,0-0.559-0.089-0.743c-0.091-0.188-0.467-0.465-0.467-0.465l0,0h-0.188v0.089l0,0l0,0l0,0v-0.089
          c-0.091-0.19-0.279-0.374-0.467-0.467s-0.466-0.093-0.652,0c-0.088,0-0.185,0.089-0.279,0.188c-0.188,0-0.367,0-0.465,0.091
          c-0.092,0.091-0.279,0.091-0.279,0.279c-0.093,0-0.279,0-0.372,0.094c-0.467,0.187-0.56,0.839-0.372,1.116
          C195.56,436.05,195.56,436.143,195.651,436.236z"></path>
        <path fill="#8CB347" d="M199.285,436.143L199.285,436.143L199.285,436.143z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M197.422,437.633C197.422,437.633,197.422,437.728,197.422,437.633c0,0.095,0.089,0.095,0.188,0.188
          c0.19,0.093,0.467,0.093,0.652,0c0.279-0.09,0.37-0.278,0.467-0.56c0.089,0,0.185,0,0.279-0.092
          c0.368-0.188,0.558-0.744,0.368-1.023l0,0l0,0c0-0.09,0.094-0.09,0.094-0.188c0.091-0.188,0.091-0.466,0-0.651
          c-0.094-0.188-0.279-0.369-0.466-0.465l0,0c-0.094,0-0.19,0-0.19-0.095l0,0l0,0l0,0l0,0c0,0,0,0,0-0.091
          c-0.089-0.188-0.279-0.374-0.466-0.466c-0.19-0.094-0.467-0.094-0.652,0c-0.091,0-0.191,0.092-0.279,0.188
          c0.372,0,0.741,0.19,0.931,0.468c0.279,0.094,0.466,0.28,0.652,0.562c0.188,0.558-0.094,1.117-0.563,1.396
          C198.075,437.166,197.888,437.54,197.422,437.633C197.516,437.633,197.516,437.633,197.422,437.633z"></path>
        <path fill="#8CB347" d="M199.285,436.143L199.285,436.143L199.285,436.143z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M197.98,442.011c-0.091,0.192-0.091,0.467,0,0.653c0.094,0.186,0.282,0.37,0.466,0.467
          c0.094,0,0.094,0,0.19,0c0,0,0,0,0,0.092c0.094,0.278,0.465,0.369,0.741,0.278c0,0,0.094,0,0.094-0.092
          c0.091,0.092,0.091,0.092,0.19,0.092c0.186,0.091,0.466,0.091,0.649,0c0.283-0.092,0.372-0.278,0.467-0.559
          c0.092,0,0.186,0,0.28-0.094c0.371-0.188,0.651-0.649,0.558-1.119l0.093-0.093l0,0c0,0,0-0.091,0-0.188
          c0.092-0.188-0.093-0.839-0.187-1.024c-0.095-0.186-0.652-0.838-0.652-0.838l0,0h-0.19v0.093l0,0l0.092,0.277v0.092l0,0
          c-0.092-0.187-0.28-0.369-0.467-0.369c-0.187-0.093-0.466,0-0.648,0c-0.094,0-0.19,0.09-0.284,0.188
          c-0.185,0-0.368,0-0.466,0.09c-0.091,0.092-0.279,0.19-0.279,0.28c-0.091,0-0.279,0-0.37,0.093
          c-0.466,0.188-0.561,0.839-0.373,1.119C197.888,441.826,197.98,441.918,197.98,442.011z"></path>
        <path fill="#8CB347" d="M201.613,441.826L201.613,441.826L201.613,441.826z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M199.657,443.501L199.657,443.501c0,0.089,0.093,0.089,0.189,0.188c0.188,0.094,0.466,0.094,0.652,0
          c0.281-0.094,0.374-0.28,0.466-0.559c0.093,0,0.191,0,0.28-0.096c0.372-0.186,0.563-0.74,0.372-1.021l0,0l0,0
          c0-0.09,0.093-0.09,0.093-0.188c0.092-0.188,0.092-0.467,0-0.653c-0.093-0.187-0.28-0.371-0.467-0.467l0,0
          c-0.09,0-0.188,0-0.188-0.092l0,0l0,0l0,0l0,0c0,0,0,0,0-0.092c-0.093-0.188-0.279-0.372-0.467-0.465
          c-0.186-0.093-0.465-0.093-0.648,0c-0.094,0-0.19,0.09-0.282,0.186c0.371,0,0.744,0.19,0.93,0.466
          c0.282,0.093,0.467,0.373,0.652,0.563c0.189,0.562-0.09,1.12-0.559,1.4C200.311,443.034,200.03,443.314,199.657,443.501
          C199.657,443.407,199.657,443.501,199.657,443.501z"></path>
        <path fill="#8CB347" d="M201.613,441.826L201.613,441.826L201.613,441.826z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M200.216,447.879c-0.091,0.186-0.091,0.467,0,0.65c0.09,0.188,0.279,0.373,0.466,0.466
          c0.092,0,0.092,0,0.092,0s0,0,0,0.096c0.093,0.277,0.466,0.37,0.741,0.277c0,0,0.092,0,0.092-0.089
          c0.093,0.089,0.093,0.089,0.19,0.089c0.187,0.093,0.466,0.093,0.648,0c0.279-0.089,0.372-0.277,0.467-0.559
          c0.092,0,0.188,0,0.28-0.093c0.372-0.188,0.744-0.653,0.651-1.021l0.188-0.095l0,0c0,0-0.09-0.091-0.09-0.187
          c0.09-0.191-0.093-0.653-0.191-0.843c-0.092-0.188-0.56-0.65-0.56-0.65h0.188l0,0v0.092h-0.188l-0.091,0.095v0.091l0,0
          c-0.09-0.188-0.281-0.371-0.466-0.467c-0.19-0.094-0.467-0.094-0.652,0c-0.093,0-0.187,0.091-0.279,0.188
          c-0.19,0-0.372,0-0.467,0.093c-0.09,0.093-0.281,0.093-0.281,0.278c-0.088,0-0.279,0-0.372,0.094
          c-0.466,0.188-0.56,0.84-0.369,1.117C200.03,447.693,200.125,447.783,200.216,447.879z"></path>
        <path fill="#8CB347" d="M203.755,447.783L203.755,447.783L203.755,447.783z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M201.8,449.275L201.8,449.275c0,0.093,0.088,0.093,0.187,0.186c0.188,0.095,0.466,0.095,0.652,0
          c0.279-0.09,0.372-0.278,0.465-0.559c0.091,0,0.189,0,0.279-0.09c0.372-0.188,0.563-0.744,0.372-1.026l0,0l0,0
          c0-0.089,0.092-0.089,0.092-0.188c0.093-0.186,0.093-0.466,0-0.647c-0.092-0.191-0.279-0.373-0.467-0.466l0,0
          c-0.09,0-0.187,0-0.187-0.094l0,0l0,0l0,0l0,0c0,0,0,0,0-0.093c-0.092-0.188-0.28-0.369-0.467-0.465
          c-0.187-0.09-0.465-0.09-0.648,0c-0.092,0-0.19,0.09-0.279,0.192c0.369,0,0.741,0.186,0.927,0.466
          c0.283,0.09,0.467,0.276,0.652,0.558c0.19,0.56-0.09,1.12-0.56,1.397C202.452,448.811,202.079,449.091,201.8,449.275
          L201.8,449.275z"></path>
        <path fill="#8CB347" d="M203.755,447.783L203.755,447.783L203.755,447.783z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M202.452,453.651c-0.09,0.188-0.09,0.466,0,0.649c0.092,0.188,0.283,0.369,0.467,0.466
          c0.092,0,0.092,0,0.188,0c0,0,0,0,0,0.095c0.091,0.277,0.467,0.367,0.743,0.277c0,0,0.093,0,0.093-0.092
          c0.09,0.092,0.09,0.092,0.186,0.092c0.188,0.09,0.467,0.09,0.652,0c0.279-0.092,0.372-0.277,0.466-0.563
          c0.092,0,0.19,0,0.279-0.09c0.373-0.189,0.652-0.65,0.563-1.12l0.088-0.089l0,0c0,0,0-0.097,0-0.189
          c0.093-0.188,0-0.742-0.088-0.932c-0.094-0.188-0.467-0.651-0.467-0.651h-0.09c0,0-0.282,0.278-0.282,0.188v0.189l0.093,0.091
          l0,0l0,0c0,0,0,0,0-0.091c-0.093-0.189-0.281-0.369-0.466-0.466c-0.19-0.096-0.467-0.096-0.652,0
          c-0.093,0-0.189,0.091-0.279,0.187c-0.19,0-0.372,0-0.467,0.092c-0.092,0.091-0.28,0.188-0.28,0.279
          c-0.091,0-0.279,0-0.372,0.092c-0.466,0.188-0.56,0.84-0.372,1.117C202.079,453.374,202.265,453.467,202.452,453.651z"></path>
        <path fill="#8CB347" d="M205.805,453.559L205.805,453.559L205.805,453.559z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M204.035,454.955C204.035,455.051,204.035,455.051,204.035,454.955c0,0.093,0.091,0.093,0.189,0.191
          c0.188,0.09,0.466,0.09,0.652,0c0.279-0.092,0.369-0.279,0.465-0.563c0.093,0,0.188,0,0.279-0.089
          c0.372-0.189,0.56-0.743,0.372-1.023l0,0l0,0c0-0.09,0.093-0.09,0.093-0.188c0.089-0.189,0.089-0.465,0-0.651
          c-0.093-0.188-0.281-0.373-0.467-0.468l0,0c-0.092,0-0.186,0-0.186-0.091l0,0l0,0l0,0l0,0c0,0,0,0,0-0.092
          c-0.093-0.19-0.281-0.37-0.467-0.466c-0.188-0.091-0.466-0.091-0.652,0c-0.09,0-0.188,0.093-0.279,0.188
          c0.372,0,0.744,0.189,0.932,0.466c0.279,0.09,0.467,0.28,0.65,0.559c0.188,0.563-0.092,1.122-0.559,1.4
          C204.686,454.675,204.501,454.955,204.035,454.955L204.035,454.955z"></path>
        <path fill="#8CB347" d="M205.805,453.559L205.805,453.559L205.805,453.559z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M204.593,459.427c-0.089,0.188-0.089,0.466,0,0.651c0.093,0.187,0.283,0.368,0.467,0.465
          c0.092,0,0.092,0,0.188,0c0,0,0,0,0,0.092c0.093,0.279,0.467,0.373,0.744,0.279c0,0,0.094,0,0.094-0.092
          c0.089,0.092,0.089,0.092,0.187,0.092c0.187,0.094,0.467,0.094,0.651,0c0.279-0.092,0.373-0.279,0.466-0.559
          c0.094,0,0.19,0,0.279-0.095c0.374-0.187,0.652-0.65,0.563-1.118l0.089-0.093l0,0c0,0,0-0.091,0-0.188
          c0.094-0.188-0.089-0.838-0.188-1.021c-0.091-0.19-0.649-0.84-0.649-0.84l0,0h-0.188v0.091l0,0l0.089,0.278
          c0,0,0.093,0.19,0,0.094l0,0c-0.089-0.188-0.28-0.372-0.466-0.372c-0.191-0.091-0.467,0-0.652,0
          c-0.091,0-0.186,0.091-0.279,0.188c-0.19,0-0.279,0-0.467,0.09c-0.089,0.094-0.279,0.189-0.279,0.279
          c-0.09,0-0.279,0-0.373,0.092c-0.466,0.19-0.559,0.84-0.368,1.119C204.501,459.24,204.407,459.427,204.593,459.427z"></path>
        <path fill="#8CB347" d="M208.132,459.332L208.132,459.332L208.132,459.332z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M206.177,460.916L206.177,460.916c0,0.095,0.091,0.095,0.191,0.188c0.187,0.093,0.465,0.093,0.652,0
          c0.279-0.089,0.368-0.279,0.465-0.56c0.091,0,0.185,0,0.279-0.093c0.37-0.188,0.558-0.74,0.37-1.021l0,0l0,0
          c0-0.093,0.094-0.093,0.094-0.19c0.088-0.188,0.088-0.466,0-0.652c-0.094-0.186-0.279-0.368-0.467-0.465l0,0
          c-0.094,0-0.188,0-0.188-0.092l0,0l0,0l0,0l0,0v-0.09c-0.091-0.19-0.279-0.372-0.467-0.468c-0.188-0.092-0.466-0.092-0.652,0
          c-0.089,0-0.188,0.094-0.279,0.189c0.374,0,0.744,0.188,0.932,0.465c0.279,0.093,0.467,0.28,0.652,0.56
          c0.189,0.561-0.094,1.122-0.561,1.401C206.735,460.358,206.55,460.731,206.177,460.916L206.177,460.916z"></path>
        <path fill="#8CB347" d="M208.132,459.332L208.132,459.332L208.132,459.332z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M206.735,465.2c-0.088,0.188-0.088,0.467,0,0.651c0.094,0.188,0.285,0.372,0.467,0.468
          c0.094,0,0.094,0,0.188,0c0,0,0,0,0,0.092c0.094,0.279,0.467,0.372,0.744,0.279c0,0,0.094,0,0.094-0.094
          c0.089,0.094,0.089,0.094,0.188,0.094c0.186,0.093,0.467,0.093,0.65,0c0.281-0.094,0.373-0.279,0.465-0.561
          c0.093,0,0.188,0,0.283-0.092c0.368-0.188,0.648-0.651,0.558-1.119l0.09-0.092l0,0c0,0,0-0.089,0-0.188
          c0.092-0.188,0.092-0.278,0-0.467c-0.09-0.187-0.369-0.188-0.369-0.188l0,0h-0.19v0.094l0,0l-0.089-0.282l-0.094-0.188
          l-0.091-0.094c-0.09-0.188-0.279-0.368-0.466-0.467c-0.19-0.091-0.467-0.091-0.652,0c-0.091,0-0.19,0.092-0.279,0.188
          c-0.19,0-0.373,0-0.467,0.092c-0.091,0.093-0.279,0.093-0.279,0.28c-0.094,0-0.282,0-0.373,0.092
          c-0.465,0.188-0.558,0.84-0.369,1.119C206.643,465.015,206.643,465.107,206.735,465.2z"></path>
        <path fill="#8CB347" d="M210.275,465.293L210.275,465.293L210.275,465.293z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M208.411,466.598C208.411,466.69,208.411,466.69,208.411,466.598c0,0.094,0.092,0.094,0.187,0.19
          c0.19,0.093,0.467,0.093,0.652,0c0.28-0.092,0.374-0.28,0.467-0.561c0.094,0,0.188,0,0.28-0.093
          c0.372-0.187,0.56-0.743,0.372-1.022l0,0l0,0c0-0.089,0.09-0.089,0.09-0.188c0.092-0.187,0.092-0.468,0-0.65
          c-0.09-0.188-0.28-0.373-0.466-0.466l0,0c-0.092,0-0.19,0-0.19-0.094l0,0l0,0l0,0l0,0c0,0,0,0,0-0.092
          c-0.09-0.188-0.279-0.374-0.466-0.466c-0.188-0.095-0.467-0.095-0.651,0c-0.094,0-0.187,0.089-0.279,0.188
          c0.371,0,0.742,0.189,0.93,0.468c0.28,0.089,0.466,0.278,0.652,0.559c0.187,0.56-0.093,1.119-0.56,1.397
          C209.063,466.225,208.691,466.504,208.411,466.598L208.411,466.598z"></path>
        <path fill="#8CB347" d="M210.275,465.293L210.275,465.293L210.275,465.293z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M209.063,471.067c-0.091,0.188-0.091,0.466,0,0.651c0.094,0.188,0.282,0.372,0.466,0.465
          c0.092,0,0.092,0,0.092,0s0,0,0,0.093c0.092,0.28,0.468,0.373,0.744,0.28c0,0,0.09,0,0.09-0.093
          c0.093,0.093,0.093,0.093,0.189,0.093c0.188,0.093,0.465,0.093,0.652,0c0.279-0.093,0.369-0.28,0.465-0.561
          c0.093,0,0.188,0,0.279-0.092c0.373-0.188,0.652-0.651,0.56-1.118l0.092-0.091l0,0c0,0,0-0.096,0-0.188
          c0.092-0.188,0-0.563-0.092-0.744c-0.09-0.188-0.466-0.65-0.466-0.65l0,0h-0.189v0.092v-0.092v-0.09l0,0c0,0,0,0.09,0,0
          c-0.089-0.19-0.279-0.283-0.466-0.372c-0.19-0.094-0.467,0-0.652,0.089c-0.093,0-0.188,0.093-0.279,0.189
          c-0.188,0-0.373,0-0.467,0.093c-0.091,0.091-0.28,0.188-0.28,0.279c-0.09,0-0.28,0-0.37,0.09
          c-0.466,0.19-0.562,0.843-0.373,1.121C208.784,470.788,208.971,470.976,209.063,471.067z"></path>
        <path fill="#8CB347" d="M212.509,470.976L212.509,470.976L212.509,470.976z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M210.554,472.557L210.554,472.557c0,0.094,0.091,0.094,0.187,0.188c0.19,0.093,0.467,0.093,0.652,0
          c0.279-0.09,0.371-0.279,0.467-0.561c0.092,0,0.186,0,0.279-0.088c0.372-0.19,0.56-0.746,0.372-1.025l0,0l0,0
          c0-0.09,0.09-0.09,0.09-0.189c0.092-0.185,0.092-0.465,0-0.646c-0.09-0.189-0.279-0.372-0.466-0.468l0,0
          c-0.092,0-0.189,0-0.189-0.093l0,0l0,0l0,0l0,0c0,0,0,0,0-0.088c-0.09-0.19-0.28-0.373-0.466-0.468
          c-0.185-0.091-0.467-0.091-0.651,0c-0.09,0-0.188,0.092-0.279,0.188c0.372,0,0.744,0.188,0.93,0.467
          c0.281,0.093,0.466,0.279,0.652,0.559c0.188,0.563-0.092,1.123-0.56,1.401C211.299,472.093,211.02,472.465,210.554,472.557
          C210.647,472.557,210.554,472.557,210.554,472.557z"></path>
        <path fill="#8CB347" d="M212.509,470.976L212.509,470.976L212.509,470.976z"></path>
      </g>
    </g>
  </g>
  <g>
    <g>
      <g>
        <path fill="#8CB347" d="M224.43,432.325c0.094-0.186,0.188-0.373,0.188-0.651c0-0.188-0.09-0.465-0.279-0.558l-0.094-0.097
          c0,0,0,0,0-0.09c0-0.279-0.279-0.465-0.559-0.465h-0.09c0-0.091-0.093-0.091-0.189-0.188c-0.187-0.188-0.373-0.188-0.559-0.188
          c-0.28,0-0.466,0.092-0.56,0.372c-0.092,0-0.19,0-0.19,0c-0.369,0-0.931,0.372-0.931,0.743h-0.279l0,0
          c0,0,0.093,0.09,0.093,0.188c-0.188,0.189-0.188,0.56-0.188,0.84c0,0.187,0.281-0.188,0.281,0.741l0,0c0,0,0.186,0,0.279,0.094
          l0.091-0.094l0,0v-0.092v-0.092l0,0c0,0.189,0.091,0.372,0.281,0.559c0.28,0.19,0.369,0.19,0.559,0.19
          c0.089,0,0.188,0,0.279-0.089c0.093,0.089,0.281,0.089,0.466,0.089c0.092,0,0.281,0,0.373-0.089
          c0.091,0.089,0.279,0.089,0.37,0.089c0.373,0,0.652-0.465,0.741-0.841C224.524,432.698,224.43,432.418,224.43,432.325z"></path>
        <path fill="#8CB347" d="M221.357,431.302L221.357,431.302L221.357,431.302z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M223.406,430.556L223.406,430.556c0-0.094,0-0.094-0.09-0.186c-0.19-0.191-0.372-0.191-0.562-0.191
          c-0.279,0-0.466,0.088-0.56,0.369c-0.092,0-0.186,0-0.186,0c-0.373,0-0.652,0.372-0.652,0.744l0,0l0,0
          c-0.092,0-0.092,0.092-0.19,0.187c-0.187,0.189-0.187,0.373-0.187,0.653c0,0.189,0.092,0.371,0.279,0.56l0,0
          c0.092,0,0.092,0.093,0.19,0.093l0,0l0,0l0,0l0,0c0,0,0,0,0,0.09c0,0.19,0.09,0.373,0.279,0.562
          c0.188,0.188,0.37,0.188,0.56,0.188c0.092,0,0.188,0,0.279-0.089c-0.372-0.094-0.558-0.373-0.651-0.743
          c-0.188-0.188-0.28-0.466-0.28-0.742c0-0.562,0.467-1.026,0.931-1.026C222.847,430.836,223.033,430.556,223.406,430.556
          L223.406,430.556z"></path>
        <path fill="#8CB347" d="M221.357,431.302L221.357,431.302L221.357,431.302z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M214.837,432.418c0.092-0.189,0.19-0.37,0.19-0.651c0-0.187-0.092-0.467-0.283-0.561l-0.088-0.09
          c0,0,0,0,0-0.097c0-0.277-0.281-0.465-0.559-0.465h-0.093c0-0.094-0.092-0.094-0.19-0.186c-0.187-0.191-0.369-0.191-0.558-0.191
          c-0.28,0-0.466,0.088-0.56,0.369c-0.093,0-0.188,0-0.188,0c-0.372,0-0.744,0.372-0.841,0.744h-0.09l0,0c0,0,0,0.092-0.091,0.187
          c-0.188,0.189-0.092,0.563-0.092,0.844c0,0.188,0.371-0.191,0.371,0.741l0,0c0,0,0.093,0,0.093,0.092l-0.093-0.092l0,0v-0.092
          v-0.092l0,0c0,0.19,0.093,0.373,0.279,0.56c0.19,0.19,0.372,0.19,0.56,0.19c0.093,0,0.19,0,0.279-0.093
          c0.093,0.093,0.283,0.093,0.467,0.093c0.093,0,0.281,0,0.373-0.093c0.089,0.093,0.279,0.093,0.372,0.093
          c0.369,0,0.648-0.468,0.741-0.84C214.931,432.605,214.931,432.418,214.837,432.418z"></path>
        <path fill="#8CB347" d="M211.764,431.394L211.764,431.394L211.764,431.394z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M214,430.556L214,430.556c0-0.094,0-0.094-0.093-0.186c-0.186-0.191-0.372-0.191-0.56-0.191
          c-0.279,0-0.467,0.088-0.558,0.369c-0.092,0-0.19,0-0.19,0c-0.369,0-0.649,0.372-0.649,0.744l0,0l0,0
          c-0.092,0-0.092,0.092-0.189,0.187c-0.188,0.189-0.188,0.373-0.188,0.653c0,0.189,0.09,0.371,0.28,0.56l0,0
          c0.089,0,0.089,0.093,0.187,0.093l0,0l0,0l0,0l0,0c0,0,0,0,0,0.09c0,0.19,0.092,0.373,0.28,0.562
          c0.189,0.188,0.372,0.188,0.559,0.188c0.091,0,0.189,0,0.282-0.089c-0.372-0.094-0.562-0.373-0.652-0.743
          c-0.189-0.188-0.279-0.466-0.279-0.742c0-0.562,0.466-1.026,0.931-1.026C213.255,430.836,213.534,430.65,214,430.556
          C213.906,430.65,213.906,430.65,214,430.556z"></path>
        <path fill="#8CB347" d="M211.764,431.394L211.764,431.394L211.764,431.394z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M205.246,432.325c0.091-0.186,0.19-0.373,0.19-0.651c0-0.188-0.092-0.465-0.28-0.558l-0.093-0.097
          c0,0,0,0,0-0.09c0-0.279-0.279-0.465-0.558-0.465h-0.092c0-0.091-0.092-0.091-0.188-0.188c-0.189-0.188-0.372-0.188-0.562-0.188
          c-0.279,0-0.465,0.092-0.558,0.372c-0.09,0-0.188,0-0.188,0c-0.372,0-0.652,0.372-0.652,0.743l0,0l0,0
          c0,0-0.187,0.09-0.187,0.188c-0.19,0.189-0.283,0.56-0.283,0.84c0,0.187,0.283-0.188,0.283,0.741l0,0c0,0,0.09,0,0.187,0.094
          v-0.094l0,0v-0.092v-0.092l0,0c0,0.189,0.092,0.372,0.28,0.559c0.187,0.19,0.372,0.19,0.56,0.19c0.091,0,0.189,0,0.279-0.089
          c0.092,0.089,0.279,0.089,0.467,0.089c0.093,0,0.279,0,0.372-0.089c0.09,0.089,0.28,0.089,0.369,0.089
          c0.373,0,0.652-0.465,0.743-0.841C205.337,432.605,205.246,432.418,205.246,432.325z"></path>
        <path fill="#8CB347" d="M202.079,431.302L202.079,431.302L202.079,431.302z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M204.314,430.556L204.314,430.556c0-0.094,0-0.094-0.09-0.186c-0.189-0.191-0.372-0.191-0.562-0.191
          c-0.279,0-0.465,0.088-0.558,0.369c-0.09,0-0.188,0-0.188,0c-0.372,0-0.652,0.372-0.652,0.744l0,0l0,0
          c-0.091,0-0.091,0.092-0.187,0.187c-0.19,0.189-0.19,0.373-0.19,0.653c0,0.189,0.092,0.371,0.28,0.56l0,0
          c0.091,0,0.091,0.093,0.189,0.093l0,0l0,0l0,0l0,0c0,0,0,0,0,0.09c0,0.19,0.09,0.373,0.28,0.562
          c0.188,0.188,0.372,0.188,0.559,0.188c0.093,0,0.188,0,0.281-0.089c-0.372-0.094-0.56-0.373-0.652-0.743
          c-0.187-0.188-0.279-0.466-0.279-0.742c0-0.562,0.467-1.026,0.932-1.026C203.476,430.836,203.849,430.65,204.314,430.556
          C204.221,430.556,204.314,430.556,204.314,430.556z"></path>
        <path fill="#8CB347" d="M202.079,431.302L202.079,431.302L202.079,431.302z"></path>
      </g>
    </g>
  </g>
  <g>
    <g>
      <g>
        <path fill="#8CB347" d="M226.013,473.396c0.089-0.188,0.188-0.367,0.188-0.651c0-0.188-0.094-0.467-0.279-0.561l-0.094-0.088
          c0,0,0,0,0-0.095c0-0.279-0.279-0.466-0.558-0.466h-0.094c0-0.09-0.089-0.09-0.185-0.188c-0.188-0.186-0.373-0.186-0.561-0.186
          c-0.279,0-0.467,0.09-0.558,0.369c-0.094,0-0.19,0-0.19,0c-0.373,0-0.741,0.372-0.741,0.743h-0.092l0,0c0,0,0,0.094-0.093,0.187
          c-0.188,0.191-0.09,0.561-0.09,0.844c0,0.187,0.369-0.19,0.369,0.74l0,0c0,0,0.092,0,0.092,0.091l-0.092-0.091l0,0v-0.093v-0.09
          l0,0c0,0.188,0.092,0.369,0.281,0.56c0.188,0.188,0.371,0.188,0.562,0.188c0.089,0,0.186,0,0.279-0.091
          c0.089,0.091,0.279,0.091,0.466,0.091c0.091,0,0.279,0,0.372-0.091c0.092,0.091,0.28,0.091,0.372,0.091
          c0.373,0,0.652-0.466,0.741-0.839C226.2,473.676,226.106,473.49,226.013,473.396z"></path>
        <path fill="#8CB347" d="M223.033,472.277L223.033,472.277L223.033,472.277z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M225.175,471.627L225.175,471.627c0-0.094,0-0.094-0.089-0.188c-0.19-0.191-0.372-0.191-0.559-0.191
          c-0.279,0-0.467,0.092-0.563,0.374c-0.088,0-0.188,0-0.188,0c-0.37,0-0.65,0.37-0.65,0.741l0,0l0,0
          c-0.093,0-0.093,0.091-0.187,0.188c-0.19,0.188-0.19,0.372-0.19,0.651c0,0.188,0.092,0.372,0.279,0.56l0,0
          c0.092,0,0.092,0.092,0.19,0.092l0,0l0,0l0,0l0,0c0,0,0,0,0,0.092c0,0.188,0.093,0.371,0.279,0.56
          c0.188,0.188,0.373,0.188,0.56,0.188c0.093,0,0.19,0,0.28-0.092c-0.373-0.091-0.559-0.371-0.652-0.741
          c-0.188-0.189-0.279-0.469-0.279-0.744c0-0.561,0.467-1.021,0.931-1.021C224.43,471.72,224.803,471.72,225.175,471.627
          L225.175,471.627z"></path>
        <path fill="#8CB347" d="M223.033,472.277L223.033,472.277L223.033,472.277z"></path>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M219.308,473.304c0.089-0.19,0.187-0.374,0.187-0.651c0-0.191-0.092-0.469-0.279-0.56l-0.093-0.094
          c0,0,0,0,0-0.091c0-0.279-0.279-0.467-0.56-0.467h-0.093c0-0.095-0.089-0.095-0.188-0.189c-0.189-0.188-0.371-0.188-0.559-0.188
          c-0.279,0-0.467,0.092-0.559,0.372c-0.093,0-0.189,0-0.189,0c-0.374,0-0.652,0.368-0.652,0.741l0,0l0,0
          c0,0-0.188,0.092-0.188,0.189c-0.19,0.188-0.279,0.56-0.279,0.838c0,0.188,0.279-0.189,0.279,0.742l0,0c0,0,0.09,0,0.188,0.093
          v-0.093l0,0v-0.091v-0.092l0,0c0,0.188,0.091,0.372,0.279,0.56c0.191,0.189,0.374,0.189,0.563,0.189c0.09,0,0.187,0,0.28-0.093
          c0.089,0.093,0.279,0.093,0.466,0.093c0.091,0,0.279,0,0.37-0.093c0.094,0.093,0.28,0.093,0.374,0.093
          c0.369,0,0.65-0.467,0.741-0.842C219.401,473.676,219.308,473.396,219.308,473.304z"></path>
        <path fill="#8CB347" d="M216.142,472.277L216.142,472.277L216.142,472.277z"></path>
      </g>
      <g>
        <path fill="#8CB347" d="M218.377,471.533L218.377,471.533c0-0.089,0-0.089-0.094-0.188c-0.189-0.185-0.371-0.185-0.559-0.185
          c-0.279,0-0.467,0.088-0.559,0.367c-0.093,0-0.189,0-0.189,0c-0.374,0-0.652,0.373-0.652,0.744l0,0l0,0
          c-0.089,0-0.089,0.092-0.188,0.188c-0.19,0.19-0.19,0.373-0.19,0.652c0,0.189,0.094,0.372,0.28,0.56l0,0
          c0.093,0,0.093,0.093,0.189,0.093l0,0l0,0l0,0l0,0c0,0,0,0,0,0.092c0,0.188,0.094,0.368,0.282,0.56
          c0.185,0.188,0.371,0.188,0.558,0.188c0.091,0,0.19,0,0.279-0.091c-0.369-0.092-0.558-0.371-0.652-0.743
          c-0.185-0.188-0.279-0.465-0.279-0.739c0-0.563,0.467-1.026,0.932-1.026C217.538,471.813,217.912,471.627,218.377,471.533
          C218.283,471.533,218.377,471.533,218.377,471.533z"></path>
        <path fill="#8CB347" d="M216.142,472.277L216.142,472.277L216.142,472.277z"></path>
      </g>
    </g>
  </g>
  <polygon fill="#7DA84E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="238.68,475.444 238.772,481.313 
    215.21,481.405 215.21,488.763 246.316,488.763 246.225,475.538   "></polygon>
  <text transform="matrix(1 0 0 1 228.2754 487.6025)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="3.7252">PARK</text>
  <text transform="matrix(1 0 0 1 250.8291 420.6045)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="5.1082">PARK</text>
  
    <line fill="none" stroke="#FFFFFF" stroke-width="0.25" stroke-miterlimit="10" stroke-dasharray="1" x1="207.853" y1="516.608" x2="162.5" y2="402.06"></line>
  
    <rect x="346.46" y="427.545" fill="#AA967F" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="19.371" height="20.553"></rect>
  <text transform="matrix(1 0 0 1 350.3936 439.5908)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="3.9514">School</text>
  <path fill="#7FAEBD" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" d="M196.77,479.167l-3.163,1.586
    l18.645,42.283l3.862-34.18C216.113,488.856,203.59,491.655,196.77,479.167z"></path>
  <text transform="matrix(0.4403 0.8979 -0.8979 0.4403 205.9238 492.167)" font-family="'MyriadPro-Regular'" font-size="3.4842">Recycle</text>
  <text transform="matrix(0.4403 0.8979 -0.8979 0.4403 202.9419 495.582)" font-family="'MyriadPro-Regular'" font-size="3.4842">Plant</text>
</g><g id="sector-B">
  <path fill="#05C6BC" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M305.547,535.606"></path>
  <g id="sc-B_x7C_pl-1_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="324.173,395.446 324.173,403.081 
      317.468,403.081 317.468,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 319.8867 400.4414)" font-family="'MyriadPro-Regular'" font-size="2.8781">1</text>
  </g>
  <g id="sc-B_x7C_pl-2_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="317.468,395.446 317.468,403.081 
      310.669,403.081 310.669,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 313.2383 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">2</text>
  </g>
  <g id="sc-B_x7C_pl-3_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="310.669,395.446 310.669,403.081 
      303.87,403.081 303.87,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 306.5908 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">3</text>
  </g>
  <g id="sc-B_x7C_pl-4_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="303.87,395.446 303.87,403.081 
      297.166,403.081 297.166,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 299.9404 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">4</text>
  </g>
  <g id="sc-B_x7C_pl-5_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="297.166,395.446 297.166,403.081 
      290.459,403.081 290.459,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 292.9678 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">5</text>
  </g>
  <g id="sc-B_x7C_pl-6_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="290.459,395.446 290.459,403.081 
      283.57,403.081 283.57,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 286.3193 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">6</text>
  </g>
  <g id="sc-B_x7C_pl-7_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="283.57,395.446 283.57,403.081 
      276.77,403.081 276.863,395.446    "></polygon>
    <text transform="matrix(1 0 0 1 279.3477 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">7</text>
  </g>
  <g id="sc-B_x7C_pl-8_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="276.863,395.446 276.77,403.081 
      270.157,403.081 270.157,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 272.6992 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">8</text>
  </g>
  <g id="sc-B_x7C_pl-8_x7C_st-Lane5_x7C_gz-250_1_">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="270.157,395.446 270.157,403.081 
      263.265,403.081 263.265,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 266.0498 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">9</text>
  </g>
  <g id="sc-B_x7C_pl-10_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="263.265,395.446 263.265,403.081 
      256.653,403.081 256.653,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 258.4424 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">10</text>
  </g>
  <g id="sc-B_x7C_pl-11_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="256.653,395.446 256.653,403.081 
      249.854,403.081 249.854,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 251.6982 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">11</text>
  </g>
  <g id="sc-B_x7C_pl-12_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="249.854,395.446 249.854,403.081 
      243.057,403.081 243.057,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 244.8047 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">12</text>
  </g>
  <g id="sc-B_x7C_pl-13_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="243.057,395.446 243.057,403.081 
      236.257,403.081 236.352,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 238.2324 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">13</text>
  </g>
  <g id="sc-B_x7C_pl-14_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="236.352,395.446 236.257,403.081 
      229.552,403.081 229.552,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 231.6543 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">14</text>
  </g>
  <g id="sc-B_x7C_pl-15_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="229.552,395.446 229.552,403.081 
      222.754,403.081 222.754,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 224.7588 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">15</text>
  </g>
  <g id="sc-B_x7C_pl-16_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="222.754,395.446 222.754,403.081 
      215.955,403.081 215.955,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 217.8672 400.4424)" font-family="'MyriadPro-Regular'" font-size="2.8781">16</text>
  </g>
  <g id="sc-B_x7C_pl-17_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="215.955,395.446 215.955,403.081 
      209.157,403.081 209.25,395.446    "></polygon>
    <text transform="matrix(1 0 0 1 211.2881 400.4443)" font-family="'MyriadPro-Regular'" font-size="2.8781">17</text>
  </g>
  <g id="sc-B_x7C_pl-18_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="209.25,395.446 209.157,403.081 
      202.452,403.081 202.452,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 204.3936 400.4443)" font-family="'MyriadPro-Regular'" font-size="2.8781">18</text>
  </g>
  <g id="sc-B_x7C_pl-19_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="202.452,395.446 202.452,403.081 
      195.651,403.081 195.651,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 197.498 400.4443)" font-family="'MyriadPro-Regular'" font-size="2.8781">19</text>
  </g>
  <g id="sc-B_x7C_pl-20_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="195.651,395.446 195.651,403.081 
      188.854,403.081 188.854,395.446     "></polygon>
    <text transform="matrix(1 0 0 1 190.9199 400.4443)" font-family="'MyriadPro-Regular'" font-size="2.8781">20</text>
  </g>
  <g id="sc-B_x7C_pl-21_x7C_st-6_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M187.552,403.081c0,0-3.818,0-4.75,0.652
      l-3.631-6.612c2.606-1.21,5.587-1.956,8.381-1.677V403.081L187.552,403.081z"></path>
    <text transform="matrix(1 0 0 1 182.8047 400.4443)" font-family="'MyriadPro-Regular'" font-size="2.8781">21</text>
  </g>
  <g id="sc-B_x7C_pl-22_x7C_st-6_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M182.802,403.735
      c0,0-2.515,1.211-3.539,3.166l-6.24-4.19c1.304-2.421,3.446-4.376,6.147-5.588L182.802,403.735z"></path>
    <text transform="matrix(1 0 0 1 177.1182 403.1084)" font-family="'MyriadPro-Regular'" font-size="2.8781">22</text>
  </g>
  <g id="sc-B_x7C_pl-23_x7C_st-6_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M179.263,406.901
      c0,0-0.838,0.931-0.744,4.749l-7.544-0.747c-0.093-2.887,0.372-5.772,2.049-8.194L179.263,406.901z"></path>
    <text transform="matrix(1 0 0 1 173.6904 408.7227)" font-family="'MyriadPro-Regular'" font-size="2.8781">23</text>
  </g>
  <g id="sc-B_x7C_pl-24_x7C_st-6_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M178.518,411.65
      c0.279,1.582,0.651,2.604,1.49,4.377l-6.799,2.793c0,0-2.235-5.122-2.235-7.917L178.518,411.65z"></path>
    <text transform="matrix(1 0 0 1 174.1055 415.6426)" font-family="'MyriadPro-Regular'" font-size="2.8781">24</text>
  </g>
  <g id="sc-B_x7C_pl-25_x7C_st-6_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="180.009,416.028 182.428,422.452 
      175.538,425.154 173.208,418.822     "></polygon>
    <text transform="matrix(1 0 0 1 176.0908 421.5986)" font-family="'MyriadPro-Regular'" font-size="2.8781">25</text>
  </g>
  <g id="sc-B_x7C_pl-26_x7C_st-6_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="182.428,422.452 184.849,428.788 
      177.958,431.486 175.538,425.154     "></polygon>
    <text transform="matrix(1 0 0 1 178.7627 428.1777)" font-family="'MyriadPro-Regular'" font-size="2.8781">26</text>
  </g>
  <g id="sc-B_x7C_pl-27_x7C_st-6_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="184.849,428.788 187.457,435.026 
      180.473,437.728 177.958,431.486     "></polygon>
    <text transform="matrix(1 0 0 1 181.2266 434.4756)" font-family="'MyriadPro-Regular'" font-size="2.8781">27</text>
  </g>
  <g id="sc-B_x7C_pl-28_x7C_st-6_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="187.457,435.026 189.971,441.267 
      182.986,444.06 180.473,437.728    "></polygon>
    <text transform="matrix(1 0 0 1 183.833 440.7764)" font-family="'MyriadPro-Regular'" font-size="2.8781">28</text>
  </g>
  <g id="sc-B_x7C_pl-29_x7C_st-6_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="189.971,441.267 192.302,447.506 
      185.315,450.207 182.986,444.06    "></polygon>
    <text transform="matrix(1 0 0 1 186.3613 447.1465)" font-family="'MyriadPro-Regular'" font-size="2.8781">29</text>
  </g>
  <g id="sc-B_x7C_pl-30_x7C_st-6_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="192.302,447.506 194.815,453.932 
      187.831,456.633 185.315,450.207     "></polygon>
    <text transform="matrix(1 0 0 1 188.542 453.3818)" font-family="'MyriadPro-Regular'" font-size="2.8781">30</text>
  </g>
  <g id="sc-B_x7C_pl-31_x7C_st-6_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="194.815,453.932 197.236,460.172 
      190.346,462.965 187.831,456.633     "></polygon>
    <text transform="matrix(1 0 0 1 190.9209 459.3447)" font-family="'MyriadPro-Regular'" font-size="2.8781">31</text>
  </g>
  <g id="sc-B_x7C_pl-32_x7C_st-6_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="197.236,460.172 199.75,466.504 
      192.858,469.112 190.346,462.965     "></polygon>
    <text transform="matrix(1 0 0 1 193.3857 465.8506)" font-family="'MyriadPro-Regular'" font-size="2.8781">32</text>
  </g>
  <g id="sc-B_x7C_pl-33_x7C_st-6_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="199.75,466.504 202.173,472.744 
      195.188,475.538 192.858,469.112     "></polygon>
    <text transform="matrix(1 0 0 1 196.127 471.8789)" font-family="'MyriadPro-Regular'" font-size="2.8781">33</text>
  </g>
  <g id="sc-B_x7C_pl-34_x7C_st-6_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M202.173,472.744
      c0,0,1.21,3.265,2.051,4.284l-5.867,4.655c-1.401-1.862-2.332-3.725-3.166-6.146L202.173,472.744z"></path>
    <text transform="matrix(1 0 0 1 198.2559 477.7715)" font-family="'MyriadPro-Regular'" font-size="2.8781">34</text>
  </g>
  <g id="sc-B_x7C_pl-35_x7C_st-6_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M198.354,481.685
      c0,0,3.073,4.006,4.746,4.749l4.284-6.238c0,0-1.299-0.652-3.163-3.166L198.354,481.685z"></path>
    <text transform="matrix(1 0 0 1 201.8135 482.0859)" font-family="'MyriadPro-Regular'" font-size="2.8781">35</text>
  </g>
  <g id="sc-B_x7C_pl-36_x7C_st-6_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M209.715,488.763
      c-2.233-0.466-4.748-1.12-6.614-2.329l4.283-6.238c1.4,0.742,3.353,1.211,4.937,1.399"></path>
    <text transform="matrix(1 0 0 1 206.749 485.3662)" font-family="'MyriadPro-Regular'" font-size="2.8781">36</text>
  </g>
  <g id="sc-B_x7C_pl-37_x7C_st-5_x7C_gz-250">
    
      <rect x="238.68" y="468.926" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.545" height="6.612"></rect>
    <text transform="matrix(1 0 0 1 240.9229 473.334)" font-family="'MyriadPro-Regular'" font-size="2.8781">37</text>
  </g>
  <g id="sc-B_x7C_pl-38_x7C_st-5_x7C_gz-250">
    
      <rect x="238.68" y="462.221" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.545" height="6.705"></rect>
    <text transform="matrix(1 0 0 1 240.9229 466.5107)" font-family="'MyriadPro-Regular'" font-size="2.8781">38</text>
  </g>
  <g id="sc-B_x7C_pl-39_x7C_st-4_x7C_gz-250">
    
      <rect x="269.226" y="462.221" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.357" height="6.705"></rect>
    <text transform="matrix(1 0 0 1 271.3359 466.5107)" font-family="'MyriadPro-Regular'" font-size="2.8781">39</text>
  </g>
  <g id="sc-B_x7C_pl-40_x7C_st-4_x7C_gz-250">
    
      <rect x="269.226" y="468.926" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.357" height="6.707"></rect>
    <text transform="matrix(1 0 0 1 271.3359 473.334)" font-family="'MyriadPro-Regular'" font-size="2.8781">40</text>
  </g>
  <g id="sc-B_x7C_pl-41_x7C_st-4_x7C_gz-250">
    
      <rect x="269.226" y="475.632" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.357" height="6.705"></rect>
    <text transform="matrix(1 0 0 1 271.3359 479.8398)" font-family="'MyriadPro-Regular'" font-size="2.8781">41</text>
  </g>
  <g id="sc-B_x7C_pl-42_x7C_st-4_x7C_gz-250">
    
      <rect x="269.226" y="482.337" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.357" height="6.705"></rect>
    <text transform="matrix(1 0 0 1 271.3359 486.9609)" font-family="'MyriadPro-Regular'" font-size="2.8781">42</text>
  </g>
  <g id="sc-B_x7C_pl-43_x7C_st-4_x7C_gz-250">
    
      <rect x="269.226" y="489.135" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.357" height="6.707"></rect>
    <text transform="matrix(1 0 0 1 271.3359 493.7451)" font-family="'MyriadPro-Regular'" font-size="2.8781">43</text>
  </g>
  <g id="sc-B_x7C_pl-44_x7C_st-4_x7C_gz-250">
    
      <rect x="269.226" y="495.842" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.357" height="6.705"></rect>
    <text transform="matrix(1 0 0 1 271.3359 500.1807)" font-family="'MyriadPro-Regular'" font-size="2.8781">44</text>
  </g>
  <g id="sc-B_x7C_pl-45_x7C_st-4_x7C_gz-250">
    
      <rect x="269.226" y="502.547" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.357" height="6.797"></rect>
    <text transform="matrix(1 0 0 1 271.3359 507.0957)" font-family="'MyriadPro-Regular'" font-size="2.8781">45</text>
  </g>
  <g id="sc-B_x7C_pl-46_x7C_st-4_x7C_gz-250">
    
      <rect x="269.226" y="509.252" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.357" height="6.794"></rect>
    <text transform="matrix(1 0 0 1 271.3359 513.665)" font-family="'MyriadPro-Regular'" font-size="2.8781">46</text>
  </g>
  <g id="sc-B_x7C_pl-47_x7C_st-4_x7C_gz-250">
    
      <rect x="269.226" y="516.05" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.357" height="6.796"></rect>
    <text transform="matrix(1 0 0 1 271.3359 520.4502)" font-family="'MyriadPro-Regular'" font-size="2.8781">47</text>
  </g>
  <g id="sc-B_x7C_pl-48_x7C_st-4_x7C_gz-250">
    
      <rect x="269.226" y="522.754" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.357" height="6.707"></rect>
    <text transform="matrix(1 0 0 1 271.3359 527.0928)" font-family="'MyriadPro-Regular'" font-size="2.8781">48</text>
  </g>
  <g id="sc-B_x7C_pl-49_x7C_st-4_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M276.583,529.554h-7.357l0.19,3.634
      c0,0,0,1.768,1.674,5.122l6.518-3.913C277.329,533.745,276.583,533.093,276.583,529.554z"></path>
    <text transform="matrix(1 0 0 1 271.3369 534.0791)" font-family="'MyriadPro-Regular'" font-size="2.8781">49</text>
  </g>
  <g id="sc-B_x7C_pl-50_x7C_st-4_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M277.608,544.176
      c0,0-4.655-2.329-6.517-5.773l6.517-3.916c0,0,0.279,1.583,2.982,3.073l0,0L277.608,544.176z"></path>
    <text transform="matrix(1 0 0 1 274.7637 539.835)" font-family="'MyriadPro-Regular'" font-size="2.8781">50</text>
  </g>
  <g id="sc-B_x7C_pl-51_x7C_st-Lane1_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M277.608,544.176
      c0,0,2.515,1.861,8.66,1.396l-0.841-7.445c0,0-3.353,0.561-4.843-0.559L277.608,544.176z"></path>
    <text transform="matrix(1 0 0 1 280.585 543.1904)" font-family="'MyriadPro-Regular'" font-size="2.8781">51</text>
  </g>
  <g id="sc-B_x7C_pl-52_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="292.136,537.377 285.431,538.122 
      286.268,545.571 292.975,544.827     "></polygon>
    <text transform="matrix(1 0 0 1 287.7051 542.3193)" font-family="'MyriadPro-Regular'" font-size="2.8781">52</text>
  </g>
  <g id="sc-B_x7C_pl-53_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="292.136,537.377 298.841,536.538 
      299.679,543.99 292.975,544.827    "></polygon>
    <text transform="matrix(1 0 0 1 294.5938 541.5479)" font-family="'MyriadPro-Regular'" font-size="2.8781">53</text>
  </g>
  <g id="sc-B_x7C_pl-54_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="306.479,543.242 305.547,535.606 
      298.841,536.538 299.679,543.99    "></polygon>
    <text transform="matrix(1 0 0 1 301.3076 540.7744)" font-family="'MyriadPro-Regular'" font-size="2.8781">54</text>
  </g>
  <g id="sc-B_x7C_pl-55_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="305.547,535.606 312.161,534.77 
      313.184,542.406 306.479,543.242     "></polygon>
    <text transform="matrix(1 0 0 1 307.8799 540.002)" font-family="'MyriadPro-Regular'" font-size="2.8781">55</text>
  </g>
  <g id="sc-B_x7C_pl-56_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="312.161,534.77 318.864,534.021 
      319.889,541.567 313.184,542.406     "></polygon>
    <text transform="matrix(1 0 0 1 314.5283 539.2305)" font-family="'MyriadPro-Regular'" font-size="2.8781">56</text>
  </g>
  <g id="sc-B_x7C_pl-57_x7C_st-Lane1_x7C_gz-250">
    <polyline fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="318.864,534.021 325.664,533.188 
      326.596,540.729 326.596,540.729 319.889,541.567 318.864,534.021     "></polyline>
    <text transform="matrix(1 0 0 1 321.5127 538.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">57</text>
  </g>
  <g id="sc-B_x7C_pl-58_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="325.664,533.188 332.368,532.534 
      333.207,539.983 326.596,540.729     "></polygon>
    <text transform="matrix(1 0 0 1 327.8828 537.6846)" font-family="'MyriadPro-Regular'" font-size="2.8781">58</text>
  </g>
  <g id="sc-B_x7C_pl-59_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="339.074,531.695 339.912,539.053 
      333.207,539.983 332.368,532.534     "></polygon>
    <text transform="matrix(1 0 0 1 334.5967 536.9121)" font-family="'MyriadPro-Regular'" font-size="2.8781">59</text>
  </g>
  <g id="sc-B_x7C_pl-60_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="345.777,530.858 346.617,538.401 
      339.912,539.053 339.074,531.695     "></polygon>
    <text transform="matrix(1 0 0 1 341.4473 536.1406)" font-family="'MyriadPro-Regular'" font-size="2.8781">60</text>
  </g>
  <g id="sc-B_x7C_pl-61_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="352.484,529.927 353.323,537.377 
      353.323,537.563 346.617,538.401 345.777,530.858     "></polygon>
    <text transform="matrix(1 0 0 1 348.1201 535.6748)" font-family="'MyriadPro-Regular'" font-size="2.8781">61</text>
  </g>
  <g id="sc-B_x7C_pl-62_x7C_st-Lane1_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M353.323,537.563
      c3.075-0.561,5.958-1.858,8.099-4.191l-5.494-5.309c-0.931,0.933-2.234,1.676-3.541,1.955L353.323,537.563z"></path>
    <text transform="matrix(1 0 0 1 354.4902 533.7549)" font-family="'MyriadPro-Regular'" font-size="2.8781">62</text>
  </g>
  <g id="sc-B_x7C_pl-63_x7C_st-Lane1_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M356.023,527.97
      c0,0,1.953-2.606,1.953-4.377l7.637,0.745c-0.37,3.354-1.771,6.612-4.285,9.128L356.023,527.97z"></path>
    <text transform="matrix(1 0 0 1 359.29 528.4248)" font-family="'MyriadPro-Regular'" font-size="2.8781">63</text>
  </g>
  <g id="sc-B_x7C_pl-64_x7C_st-Lane1_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M363.382,514.466
      c0,0,2.231,3.814,2.421,7.078l-0.189,2.791l-7.637-0.742c0.094-1.77-0.188-3.541-0.932-4.934L363.382,514.466z"></path>
    <text transform="matrix(1 0 0 1 360.3213 520.8896)" font-family="'MyriadPro-Regular'" font-size="2.8781">64</text>
  </g>
  <g id="sc-B_x7C_pl-65_x7C_st-Lane1_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M353.137,515.491
      c1.581,0.743,2.887,1.862,3.912,3.165l6.336-4.191c-1.861-2.885-4.749-4.937-8.01-6.146L353.137,515.491z"></path>
    <text transform="matrix(1 0 0 1 356.0107 514.5068)" font-family="'MyriadPro-Regular'" font-size="2.8781">65</text>
  </g>
  <g id="sc-B_x7C_pl-66_x7C_st-Lane1_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M348.109,515.491
      c1.582-0.369,3.354-0.369,5.027,0l2.232-7.167c0,0-5.214-1.773-9.872,0.088L348.109,515.491z"></path>
    <text transform="matrix(1 0 0 1 349.0264 512.6172)" font-family="'MyriadPro-Regular'" font-size="2.8781">66</text>
  </g>
  <g id="sc-B_x7C_pl-67_x7C_st-Lane1_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M344.289,518.75
      c0,0,1.674-2.514,3.814-3.263l-2.605-6.984c-3.074,1.211-5.682,3.444-7.547,6.053L344.289,518.75z"></path>
    <text transform="matrix(1 0 0 1 342.3125 515.1523)" font-family="'MyriadPro-Regular'" font-size="2.8781">67</text>
  </g>
  <g id="sc-B_x7C_pl-68_x7C_st-Lane1_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M343.266,523.593l-5.404,0.561l-0.93-7.355
      c0.094-0.84,0.559-1.584,1.024-2.235l6.332,4.193C344.01,518.938,343.266,520.985,343.266,523.593z"></path>
    <text transform="matrix(1 0 0 1 338.6377 521.2461)" font-family="'MyriadPro-Regular'" font-size="2.8781">68</text>
  </g>
  <g id="sc-B_x7C_pl-69_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="330.412,517.633 336.932,516.796 
      337.863,524.151 331.157,525.084     "></polygon>
    <text transform="matrix(1 0 0 1 332.6748 522.002)" font-family="'MyriadPro-Regular'" font-size="2.8781">69</text>
  </g>
  <g id="sc-B_x7C_pl-70_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="323.707,518.377 330.412,517.633 
      331.157,525.084 324.639,525.829     "></polygon>
    <text transform="matrix(1 0 0 1 326.1689 522.9844)" font-family="'MyriadPro-Regular'" font-size="2.8781">70</text>
  </g>
  <g id="sc-B_x7C_pl-71_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="316.91,519.122 323.707,518.377 
      324.639,525.829 317.841,526.573     "></polygon>
    <text transform="matrix(1 0 0 1 319.1846 523.4824)" font-family="'MyriadPro-Regular'" font-size="2.8781">71</text>
  </g>
  <g id="sc-B_x7C_pl-72_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="310.203,520.057 316.91,519.122 
      317.841,526.573 311.135,527.412     "></polygon>
    <text transform="matrix(1 0 0 1 312.6055 524.4092)" font-family="'MyriadPro-Regular'" font-size="2.8781">72</text>
  </g>
  <g id="sc-B_x7C_pl-73_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="303.592,520.893 310.203,520.057 
      311.135,527.412 304.522,528.342     "></polygon>
    <text transform="matrix(1 0 0 1 305.9834 525.3848)" font-family="'MyriadPro-Regular'" font-size="2.8781">73</text>
  </g>
  <g id="sc-B_x7C_pl-74_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="296.792,521.73 303.592,520.893 
      304.522,528.342 297.632,529.181     "></polygon>
    <text transform="matrix(1 0 0 1 299.0957 526.3096)" font-family="'MyriadPro-Regular'" font-size="2.8781">74</text>
  </g>
  <g id="sc-B_x7C_pl-75_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="290.087,522.476 296.792,521.73 
      297.632,529.181 290.925,529.927     "></polygon>
    <text transform="matrix(1 0 0 1 292.1289 527.0928)" font-family="'MyriadPro-Regular'" font-size="2.8781">75</text>
  </g>
  <g id="sc-B_x7C_pl-76_x7C_st-Lane1_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="284.127,530.671 284.221,523.034 
      290.087,522.476 290.925,529.927     "></polygon>
    <text transform="matrix(1 0 0 1 285.9072 527.4863)" font-family="'MyriadPro-Regular'" font-size="2.8781">76</text>
  </g>
  <g id="sc-B_x7C_pl-77_x7C_st-Lane2_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="284.221,515.491 289.25,514.932 
      290.087,522.476 284.221,523.034     "></polygon>
    <text transform="matrix(1 0 0 1 285.3447 520.4502)" font-family="'MyriadPro-Regular'" font-size="2.8781">77</text>
  </g>
  <g id="sc-B_x7C_pl-78_x7C_st-Lane2_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="295.954,514 296.792,521.73 
      290.087,522.476 289.25,514.932    "></polygon>
    <text transform="matrix(1 0 0 1 291.251 519.9082)" font-family="'MyriadPro-Regular'" font-size="2.8781">78</text>
  </g>
  <g id="sc-B_x7C_pl-81_x7C_st-Lane2_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="302.661,513.256 303.592,520.893 
      296.792,521.73 295.954,514    "></polygon>
    <text transform="matrix(1 0 0 1 298.1895 518.9619)" font-family="'MyriadPro-Regular'" font-size="2.8781">79</text>
  </g>
  <g id="sc-B_x7C_pl-80_x7C_st-Lane2_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="309.365,512.418 310.203,520.057 
      303.592,520.893 302.661,513.256     "></polygon>
    <text transform="matrix(1 0 0 1 304.9678 518.1865)" font-family="'MyriadPro-Regular'" font-size="2.8781">80</text>
  </g>
  <g id="sc-B_x7C_pl-81_x7C_st-Lane2_x7C_gz-250_1_">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="316.07,511.58 316.91,519.122 
      310.203,520.057 309.365,512.418     "></polygon>
    <text transform="matrix(1 0 0 1 311.5957 517.3652)" font-family="'MyriadPro-Regular'" font-size="2.8781">81</text>
  </g>
  <g id="sc-B_x7C_pl-82_x7C_st-Lane2_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="322.684,510.648 323.707,518.377 
      316.91,519.122 316.07,511.58    "></polygon>
    <text transform="matrix(1 0 0 1 318.377 516.1826)" font-family="'MyriadPro-Regular'" font-size="2.8781">82</text>
  </g>
  <g id="sc-B_x7C_pl-83_x7C_st-Lane2_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="329.389,509.81 330.412,517.633 
      323.707,518.377 322.684,510.556     "></polygon>
    <text transform="matrix(1 0 0 1 325.0049 515.709)" font-family="'MyriadPro-Regular'" font-size="2.8781">83</text>
  </g>
  <g id="sc-B_x7C_pl-84_x7C_st-Lane2_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M329.389,509.81l2.607-0.369l6.333,4.653
      c0,0-1.3,1.303-1.397,2.703l-6.518,0.837L329.389,509.81z"></path>
    <text transform="matrix(1 0 0 1 331.7373 515.1523)" font-family="'MyriadPro-Regular'" font-size="2.8781">84</text>
  </g>
  <g id="sc-B_x7C_pl-85_x7C_st-Lane2_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M338.328,514.094l-6.235-4.563
      c1.397-3.266,6.427-6.239,6.427-6.239l4.283,6.797L338.328,514.094z"></path>
    <text transform="matrix(1 0 0 1 336.5117 510.4258)" font-family="'MyriadPro-Regular'" font-size="2.8781">85</text>
  </g>
  <g id="sc-B_x7C_pl-86_x7C_st-Lane2_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M347.082,500.216l1.305,7.64
      c-2.052,0.369-3.914,1.021-5.587,2.232l-4.284-6.797C339.168,502.826,341.122,501.242,347.082,500.216z"></path>
    <text transform="matrix(1 0 0 1 342.7969 506.207)" font-family="'MyriadPro-Regular'" font-size="2.8781">86</text>
  </g>
  <g id="sc-B_x7C_pl-87_x7C_st-Lane2_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M356.395,500.403l-1.951,7.82
      c0,0-3.726-0.837-6.053-0.369l-1.305-7.64C347.082,500.216,349.971,499.287,356.395,500.403z"></path>
    <text transform="matrix(1 0 0 1 349.8867 505.0889)" font-family="'MyriadPro-Regular'" font-size="2.8781">87</text>
  </g>
  <g id="sc-B_x7C_pl-88_x7C_st-Lane2_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M364.126,504.78l-4.283,5.959
      c0,0-2.981-2.232-5.403-2.516l1.953-7.82C356.583,500.311,362.075,502.452,364.126,504.78z"></path>
    <text transform="matrix(1 0 0 1 357.084 506.8867)" font-family="'MyriadPro-Regular'" font-size="2.8781">88</text>
  </g>
  <g id="sc-B_x7C_pl-89_x7C_st-1_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M365.988,485.409h-7.637v7.638
      c0,0,6.336,0.743,7.637,2.983C365.988,495.002,365.988,485.409,365.988,485.409z"></path>
    <text transform="matrix(1 0 0 1 360.8867 491.1445)" font-family="'MyriadPro-Regular'" font-size="2.8781">89</text>
  </g>
  <g id="sc-B_x7C_pl-98_x7C_st-1_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M350.809,485.503v7.171
      c0,0-6.615,0.56-7.451,0.839v-8.01H350.809L350.809,485.503z"></path>
    <text transform="matrix(1 0 0 1 344.835 490.4258)" font-family="'MyriadPro-Regular'" font-size="2.8781">98</text>
  </g>
  <g id="sc-B_x7C_pl-97_x7C_st-1_x7C_gz-250">
    
      <rect x="343.357" y="478.703" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.451" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 345.4746 483.1826)" font-family="'MyriadPro-Regular'" font-size="2.8781">97</text>
  </g>
  <g id="sc-B_x7C_pl-100_x7C_st-2_x7C_gz-250">
    
      <rect x="335.908" y="478.703" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.447" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 337.5713 483.1826)" font-family="'MyriadPro-Regular'" font-size="2.8781">100</text>
  </g>
  <g id="sc-B_x7C_pl-96_x7C_st-1_x7C_gz-250">
    
      <rect x="343.357" y="471.999" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.451" height="6.799"></rect>
    <text transform="matrix(1 0 0 1 345.4746 476.1475)" font-family="'MyriadPro-Regular'" font-size="2.8781">96</text>
  </g>
  <g id="sc-B_x7C_pl-101_x7C_st-2_x7C_gz-250">
    
      <rect x="335.908" y="471.999" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.447" height="6.799"></rect>
    <text transform="matrix(1 0 0 1 337.5713 476.1475)" font-family="'MyriadPro-Regular'" font-size="2.8781">101</text>
  </g>
  <g id="sc-B_x7C_pl-95_x7C_st-1_x7C_gz-250">
    
      <rect x="343.357" y="465.293" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.451" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 345.4746 469.3604)" font-family="'MyriadPro-Regular'" font-size="2.8781">95</text>
  </g>
  <g id="sc-B_x7C_pl-102_x7C_st-2_x7C_gz-250">
    
      <rect x="335.908" y="465.293" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.447" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 337.5713 469.3604)" font-family="'MyriadPro-Regular'" font-size="2.8781">102</text>
  </g>
  <g id="sc-B_x7C_pl-94_x7C_st-1_x7C_gz-250">
    
      <rect x="343.357" y="458.588" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.451" height="6.709"></rect>
    <text transform="matrix(1 0 0 1 345.4746 463.0303)" font-family="'MyriadPro-Regular'" font-size="2.8781">94</text>
  </g>
  <g id="sc-B_x7C_pl-103_x7C_st-2_x7C_gz-250">
    
      <rect x="335.908" y="458.588" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.447" height="6.709"></rect>
    <text transform="matrix(1 0 0 1 337.5713 463.0303)" font-family="'MyriadPro-Regular'" font-size="2.8781">103</text>
  </g>
  <g id="sc-B_x7C_pl-104_x7C_st-2_x7C_gz-250">
    
      <rect x="314.302" y="458.588" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.709"></rect>
    <text transform="matrix(1 0 0 1 315.6006 463.0313)" font-family="'MyriadPro-Regular'" font-size="2.8781">104</text>
  </g>
  <g id="sc-B_x7C_pl-117_x7C_st-3_x7C_gz-250">
    
      <rect x="306.852" y="458.588" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.45" height="6.709"></rect>
    <text transform="matrix(1 0 0 1 308.3379 463.0313)" font-family="'MyriadPro-Regular'" font-size="2.8781">117</text>
  </g>
  <g id="sc-B_x7C_pl-105_x7C_st-2_x7C_gz-250">
    
      <rect x="314.302" y="465.293" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 315.6006 469.3623)" font-family="'MyriadPro-Regular'" font-size="2.8781">105</text>
  </g>
  <g id="sc-B_x7C_pl-116_x7C_st-3_x7C_gz-250">
    
      <rect x="306.852" y="465.293" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.45" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 308.3379 469.3623)" font-family="'MyriadPro-Regular'" font-size="2.8781">116</text>
  </g>
  <g id="sc-B_x7C_pl-106_x7C_st-2_x7C_gz-250">
    
      <rect x="314.302" y="471.999" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.799"></rect>
    <text transform="matrix(1 0 0 1 315.6006 476.1475)" font-family="'MyriadPro-Regular'" font-size="2.8781">106</text>
  </g>
  <g id="sc-B_x7C_pl-115_x7C_st-3_x7C_gz-250">
    
      <rect x="306.852" y="471.999" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.45" height="6.799"></rect>
    <text transform="matrix(1 0 0 1 308.3379 476.1475)" font-family="'MyriadPro-Regular'" font-size="2.8781">115</text>
  </g>
  <g id="sc-B_x7C_pl-107_x7C_st-2_x7C_gz-250">
    
      <rect x="314.302" y="478.703" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 315.6006 483.1836)" font-family="'MyriadPro-Regular'" font-size="2.8781">107</text>
  </g>
  <g id="sc-B_x7C_pl-114_x7C_st-3_x7C_gz-250">
    
      <rect x="306.852" y="478.703" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.45" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 308.3379 483.1836)" font-family="'MyriadPro-Regular'" font-size="2.8781">114</text>
  </g>
  <g id="sc-B_x7C_pl-108_x7C_st-2_x7C_gz-250">
    
      <rect x="314.302" y="485.409" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.614"></rect>
    <text transform="matrix(1 0 0 1 315.6016 489.9092)" font-family="'MyriadPro-Regular'" font-size="2.8781">108</text>
  </g>
  <g id="sc-B_x7C_pl-113_x7C_st-3_x7C_gz-250">
    
      <rect x="306.852" y="485.409" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.45" height="6.614"></rect>
    <text transform="matrix(1 0 0 1 308.3379 489.9092)" font-family="'MyriadPro-Regular'" font-size="2.8781">113</text>
  </g>
  <g id="sc-B_x7C_pl-109st-2_x7C_gz-250">
    
      <rect x="314.302" y="492.022" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.799"></rect>
    <text transform="matrix(1 0 0 1 315.6016 496.2285)" font-family="'MyriadPro-Regular'" font-size="2.8781">109</text>
  </g>
  <g id="sc-B_x7C_pl-112_x7C_st-3_x7C_gz-250">
    
      <rect x="306.852" y="492.022" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.45" height="6.799"></rect>
    <text transform="matrix(1 0 0 1 308.3379 496.2285)" font-family="'MyriadPro-Regular'" font-size="2.8781">112</text>
  </g>
  <g id="sc-B_x7C_pl-110_x7C_st-2_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M321.751,498.914v4.749
      c0,0-6.426,0.74-7.449,0.838v-5.587H321.751L321.751,498.914z"></path>
    <text transform="matrix(1 0 0 1 315.6016 502.3467)" font-family="'MyriadPro-Regular'" font-size="2.8781">110</text>
  </g>
  <g id="sc-B_x7C_pl-111_x7C_st-3_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M306.852,498.914h7.45v5.587
      c0,0-5.778,0.56-7.45,0.839V498.914z"></path>
    <text transform="matrix(1 0 0 1 308.3379 502.3467)" font-family="'MyriadPro-Regular'" font-size="2.8781">111</text>
  </g>
  <g id="sc-B_x7C_pl-124_x7C_st-3_x7C_gz-250">
    <polyline fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="299.214,501.242 299.214,506.271 
      291.764,507.11 291.764,501.242 299.214,501.242    "></polyline>
    <text transform="matrix(1 0 0 1 292.9316 505.2783)" font-family="'MyriadPro-Regular'" font-size="2.8781">124</text>
  </g>
  <g id="sc-B_x7C_pl-125_x7C_st-4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="284.313,501.242 284.313,507.947 
      291.764,507.11 291.764,501.242    "></polygon>
    <text transform="matrix(1 0 0 1 285.6689 505.2783)" font-family="'MyriadPro-Regular'" font-size="2.8781">125</text>
  </g>
  <g id="sc-B_x7C_pl-123_x7C_st-3_x7C_gz-250">
    
      <rect x="291.764" y="494.351" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.451" height="6.891"></rect>
    <text transform="matrix(1 0 0 1 292.9316 498.8613)" font-family="'MyriadPro-Regular'" font-size="2.8781">123</text>
  </g>
  <g id="sc-B_x7C_pl-126_x7C_st-4_x7C_gz-250">
    
      <rect x="284.313" y="494.351" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.891"></rect>
    <text transform="matrix(1 0 0 1 285.6689 498.8613)" font-family="'MyriadPro-Regular'" font-size="2.8781">126</text>
  </g>
  <g id="sc-B_x7C_pl-122_x7C_st-3_x7C_gz-250">
    
      <rect x="291.764" y="487.553" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.451" height="6.891"></rect>
    <text transform="matrix(1 0 0 1 292.9316 492.1289)" font-family="'MyriadPro-Regular'" font-size="2.8781">122</text>
  </g>
  <g id="sc-B_x7C_pl-127_x7C_st-4_x7C_gz-250">
    
      <rect x="284.313" y="487.553" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.891"></rect>
    <text transform="matrix(1 0 0 1 285.6689 492.1289)" font-family="'MyriadPro-Regular'" font-size="2.8781">127</text>
  </g>
  <g id="sc-B_x7C_pl-121_x7C_st-3_x7C_gz-250">
    
      <rect x="291.764" y="480.566" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.451" height="6.888"></rect>
    <text transform="matrix(1 0 0 1 292.9316 485.3643)" font-family="'MyriadPro-Regular'" font-size="2.8781">121</text>
  </g>
  <g id="sc-B_x7C_pl-128_x7C_st-4_x7C_gz-250">
    
      <rect x="284.313" y="480.566" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.888"></rect>
    <text transform="matrix(1 0 0 1 285.6689 485.3643)" font-family="'MyriadPro-Regular'" font-size="2.8781">128</text>
  </g>
  <g id="sc-B_x7C_pl-120_x7C_st-3_x7C_gz-250">
    
      <rect x="291.764" y="473.676" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.451" height="6.891"></rect>
    <text transform="matrix(1 0 0 1 292.9316 478.2734)" font-family="'MyriadPro-Regular'" font-size="2.8781">120</text>
  </g>
  <g id="sc-B_x7C_pl-129_x7C_st-4_x7C_gz-250">
    
      <rect x="284.313" y="473.676" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.891"></rect>
    <text transform="matrix(1 0 0 1 285.6689 478.2734)" font-family="'MyriadPro-Regular'" font-size="2.8781">129</text>
  </g>
  <g id="sc-B_x7C_pl-119_x7C_st-3_x7C_gz-250">
    
      <rect x="291.764" y="466.877" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.451" height="6.799"></rect>
    <text transform="matrix(1 0 0 1 292.9316 471.335)" font-family="'MyriadPro-Regular'" font-size="2.8781">119</text>
  </g>
  <g id="sc-B_x7C_pl-118_x7C_st-3_x7C_gz-250">
    
      <rect x="291.764" y="459.984" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.451" height="6.888"></rect>
    <text transform="matrix(1 0 0 1 292.9316 464.5566)" font-family="'MyriadPro-Regular'" font-size="2.8781">118</text>
  </g>
  <g id="sc-B_x7C_pl-130_x7C_st-4_x7C_gz-250">
    
      <rect x="284.313" y="466.877" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.799"></rect>
    <text transform="matrix(1 0 0 1 285.6689 471.335)" font-family="'MyriadPro-Regular'" font-size="2.8781">130</text>
  </g>
  <g id="sc-B_x7C_pl-132_x7C_st-Lane3_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M313.091,448.438h4.747
      c0,0,1.12-0.373,1.771-2.051c0.371-1.115,0.093-1.768,1.861-2.699c0,0,2.607-0.841,2.607-2.982l0,0h-10.992L313.091,448.438
      L313.091,448.438z"></path>
    <text transform="matrix(1 0 0 1 314.7139 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">132</text>
  </g>
  <g id="sc-B_x7C_pl-155_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="313.091" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="10.992" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 315.6006 437.9541)" font-family="'MyriadPro-Regular'" font-size="2.8781">155</text>
  </g>
  <g id="sc-B_x7C_pl-156_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="324.264,418.261 324.264,425.899 
      317.468,425.899 317.468,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 318.543 422.8516)" font-family="'MyriadPro-Regular'" font-size="2.8781">156</text>
  </g>
  <g id="sc-B_x7C_pl-157_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="317.468,418.261 317.468,425.899 
      310.576,425.899 310.576,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 311.9648 422.8262)" font-family="'MyriadPro-Regular'" font-size="2.8781">157</text>
  </g>
  <g id="sc-B_x7C_pl-183_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="324.264,410.72 324.264,418.261 
      317.468,418.261 317.468,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 318.3232 415.6475)" font-family="'MyriadPro-Regular'" font-size="2.8781">183</text>
  </g>
  <g id="sc-B_x7C_pl-182_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="317.468,410.72 317.468,418.261 
      310.576,418.261 310.576,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 311.7441 415.6279)" font-family="'MyriadPro-Regular'" font-size="2.8781">182</text>
  </g>
  <g id="sc-B_x7C_pl-158_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="310.576,418.261 310.576,425.899 
      303.963,425.899 303.963,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 304.9678 422.8262)" font-family="'MyriadPro-Regular'" font-size="2.8781">158</text>
  </g>
  <g id="sc-B_x7C_pl-181_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="310.576,410.72 310.576,418.261 
      303.963,418.261 303.963,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 305.2324 415.6279)" font-family="'MyriadPro-Regular'" font-size="2.8781">181</text>
  </g>
  <g id="sc-B_x7C_pl-159_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="303.963,418.261 303.963,425.899 
      297.166,425.899 297.166,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 298.5625 422.8262)" font-family="'MyriadPro-Regular'" font-size="2.8781">159</text>
  </g>
  <g id="sc-B_x7C_pl-180_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="303.963,410.72 303.963,418.261 
      297.166,418.261 297.166,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 298.3447 415.6279)" font-family="'MyriadPro-Regular'" font-size="2.8781">180</text>
  </g>
  <g id="sc-B_x7C_pl-160_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="297.166,418.261 297.166,425.899 
      290.366,425.899 290.366,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 291.3848 422.8262)" font-family="'MyriadPro-Regular'" font-size="2.8781">160</text>
  </g>
  <g id="sc-B_x7C_pl-179_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="297.166,410.72 297.166,418.261 
      290.366,418.261 290.366,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 291.4873 415.6279)" font-family="'MyriadPro-Regular'" font-size="2.8781">179</text>
  </g>
  <g id="sc-B_x7C_pl-161_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="290.366,418.261 290.366,425.899 
      283.661,425.899 283.661,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 284.6074 422.8262)" font-family="'MyriadPro-Regular'" font-size="2.8781">161</text>
  </g>
  <g id="sc-B_x7C_pl-178_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="290.366,410.72 290.366,418.261 
      283.661,418.261 283.661,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 284.7021 415.6279)" font-family="'MyriadPro-Regular'" font-size="2.8781">178</text>
  </g>
  <g id="sc-B_x7C_pl-162_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="283.661,418.261 283.661,425.899 
      276.77,425.899 276.77,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 278.0811 422.8262)" font-family="'MyriadPro-Regular'" font-size="2.8781">162</text>
  </g>
  <g id="sc-B_x7C_pl-177_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="283.661,410.72 283.661,418.261 
      276.77,418.261 276.77,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 278.1777 415.6279)" font-family="'MyriadPro-Regular'" font-size="2.8781">177</text>
  </g>
  <g id="sc-B_x7C_pl-163_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="236.352,418.261 236.352,425.899 
      229.459,425.899 229.459,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 230.6895 422.8271)" font-family="'MyriadPro-Regular'" font-size="2.8781">163</text>
  </g>
  <g id="sc-B_x7C_pl-176_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="236.352,410.72 236.352,418.261 
      229.459,418.261 229.459,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 230.4717 415.6279)" font-family="'MyriadPro-Regular'" font-size="2.8781">176</text>
  </g>
  <g id="sc-B_x7C_pl-164_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="229.459,418.261 229.459,425.899 
      222.847,425.899 222.847,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 224.2285 422.8271)" font-family="'MyriadPro-Regular'" font-size="2.8781">164</text>
  </g>
  <g id="sc-B_x7C_pl-175_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="229.459,410.72 229.459,418.261 
      222.847,418.261 222.847,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 224.0107 415.6279)" font-family="'MyriadPro-Regular'" font-size="2.8781">175</text>
  </g>
  <g id="sc-B_x7C_pl-165_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="222.847,418.261 222.847,425.899 
      216.049,425.899 216.049,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 217.3359 422.8271)" font-family="'MyriadPro-Regular'" font-size="2.8781">165</text>
  </g>
  <g id="sc-B_x7C_pl-174_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="222.847,410.72 222.847,418.261 
      216.049,418.261 216.049,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 217.1152 415.6279)" font-family="'MyriadPro-Regular'" font-size="2.8781">174</text>
  </g>
  <g id="sc-B_x7C_pl-166_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="216.049,418.261 216.049,425.899 
      209.157,425.899 209.157,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 210.3965 422.8271)" font-family="'MyriadPro-Regular'" font-size="2.8781">166</text>
  </g>
  <g id="sc-B_x7C_pl-173_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="216.049,410.72 216.049,418.261 
      209.157,418.261 209.157,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 210.1768 415.6299)" font-family="'MyriadPro-Regular'" font-size="2.8781">173</text>
  </g>
  <g id="sc-B_x7C_pl-167_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="209.157,418.261 209.157,425.899 
      202.452,425.899 202.452,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 203.8623 422.8271)" font-family="'MyriadPro-Regular'" font-size="2.8781">167</text>
  </g>
  <g id="sc-B_x7C_pl-172_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="209.157,410.72 209.157,418.261 
      202.452,418.261 202.452,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 203.6426 415.6299)" font-family="'MyriadPro-Regular'" font-size="2.8781">172</text>
  </g>
  <g id="sc-B_x7C_pl-168_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="202.452,418.261 202.452,425.899 
      195.747,425.899 195.747,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 196.9688 422.8271)" font-family="'MyriadPro-Regular'" font-size="2.8781">168</text>
  </g>
  <g id="sc-B_x7C_pl-171_x7C_st-Lane5_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="202.452,410.72 202.452,418.261 
      195.747,418.261 195.747,410.72    "></polygon>
    <text transform="matrix(1 0 0 1 196.748 415.6299)" font-family="'MyriadPro-Regular'" font-size="2.8781">171</text>
  </g>
  <g id="sc-B_x7C_pl-169_x7C_st-Lane4_x7C_gz-250">
    <polygon fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="195.747,425.899 191.743,425.899 
      188.948,418.261 195.747,418.261     "></polygon>
    <text transform="matrix(1 0 0 1 190.2734 422.8271)" font-family="'MyriadPro-Regular'" font-size="2.8781">169</text>
  </g>
  <g id="sc-B_x7C_pl-170_x7C_st-Lane5_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M195.747,410.72h-7.451
      c-1.119,0.373-1.677,1.677-1.397,2.7l2.048,4.844h6.799L195.747,410.72L195.747,410.72z"></path>
    <text transform="matrix(1 0 0 1 189.9307 415.6299)" font-family="'MyriadPro-Regular'" font-size="2.8781">170</text>
  </g>
  <g id="sc-B_x7C_pl-133_x7C_st-Lane3_x7C_gz-250">
    
      <rect x="306.386" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.705" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 307.5605 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">133</text>
  </g>
  <g id="sc-B_x7C_pl-154_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="306.386" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.705" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 307.4883 437.9541)" font-family="'MyriadPro-Regular'" font-size="2.8781">154</text>
  </g>
  <g id="sc-B_x7C_pl-134_x7C_st-Lane3_x7C_gz-250">
    
      <rect x="299.586" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.8" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 300.7051 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">134</text>
  </g>
  <g id="sc-B_x7C_pl-153_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="299.586" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.8" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 300.626 437.9551)" font-family="'MyriadPro-Regular'" font-size="2.8781">153</text>
  </g>
  <g id="sc-B_x7C_pl-137_x7C_st-Lane3_x7C_gz-250">
    
      <rect x="292.881" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.705" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 293.8428 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">135</text>
  </g>
  <g id="sc-B_x7C_pl-152_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="292.881" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.705" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 293.7705 437.9551)" font-family="'MyriadPro-Regular'" font-size="2.8781">152</text>
  </g>
  <g id="sc-B_x7C_pl-136_x7C_st-Lane3_x7C_gz-250">
    
      <rect x="286.083" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.706" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 286.9863 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">136</text>
  </g>
  <g id="sc-B_x7C_pl-151_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="286.083" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.706" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 286.9102 437.9551)" font-family="'MyriadPro-Regular'" font-size="2.8781">151</text>
  </g>
  <g id="sc-B_x7C_pl-137_x7C_st-Lane3_x7C_gz-250_1_">
    
      <rect x="279.377" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.707" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 280.125 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">137</text>
  </g>
  <g id="sc-B_x7C_pl-150_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="279.377" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.707" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 280.0537 437.9551)" font-family="'MyriadPro-Regular'" font-size="2.8781">150</text>
  </g>
  <g id="sc-B_x7C_pl-138_x7C_st-Lane3_x7C_gz-250">
    
      <rect x="272.579" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.798" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 273.9102 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">138</text>
  </g>
  <g id="sc-B_x7C_pl-149_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="272.579" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.798" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 273.8311 437.9551)" font-family="'MyriadPro-Regular'" font-size="2.8781">149</text>
  </g>
  <g id="sc-B_x7C_pl-139_x7C_st-Lane3_x7C_gz-250">
    
      <rect x="265.781" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.709" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 267.0469 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">139</text>
  </g>
  <g id="sc-B_x7C_pl-148_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="265.781" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.709" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 266.9756 437.9551)" font-family="'MyriadPro-Regular'" font-size="2.8781">148</text>
  </g>
  <g id="sc-B_x7C_pl-140_x7C_st-Lane3_x7C_gz-250">
    
      <rect x="259.074" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.707" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 260.1895 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">140</text>
  </g>
  <g id="sc-B_x7C_pl-147_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="259.074" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.707" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 260.1113 437.9551)" font-family="'MyriadPro-Regular'" font-size="2.8781">147</text>
  </g>
  <g id="sc-B_x7C_pl-141_x7C_st-Lane3_x7C_gz-250">
    
      <rect x="252.276" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.798" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 253.6514 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">141</text>
  </g>
  <g id="sc-B_x7C_pl-146_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="252.276" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.798" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 253.5723 437.9551)" font-family="'MyriadPro-Regular'" font-size="2.8781">146</text>
  </g>
  <g id="sc-B_x7C_pl-142_x7C_st-Lane3_x7C_gz-250">
    
      <rect x="245.571" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.706" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 246.79 445.458)" font-family="'MyriadPro-Regular'" font-size="2.8781">142</text>
  </g>
  <g id="sc-B_x7C_pl-145_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="245.571" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.706" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 246.7178 437.9551)" font-family="'MyriadPro-Regular'" font-size="2.8781">145</text>
  </g>
  <g id="sc-B_x7C_pl-143_x7C_st-Lane3_x7C_gz-250">
    
      <rect x="238.772" y="440.706" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.799" height="7.73"></rect>
    <text transform="matrix(1 0 0 1 239.6182 445.46)" font-family="'MyriadPro-Regular'" font-size="2.8781">143</text>
  </g>
  <g id="sc-B_x7C_pl-144_x7C_st-Lane4_x7C_gz-250">
    
      <rect x="238.772" y="432.979" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="6.799" height="7.729"></rect>
    <text transform="matrix(1 0 0 1 239.54 437.9551)" font-family="'MyriadPro-Regular'" font-size="2.8781">144</text>
  </g>
  <g id="sc-B_x7C_pl-131_x7C_st-4_x7C_gz-250">
    
      <rect x="284.313" y="459.984" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.449" height="6.888"></rect>
    <text transform="matrix(1 0 0 1 285.6689 464.5566)" font-family="'MyriadPro-Regular'" font-size="2.8781">131</text>
  </g>
  <g id="sc-B_x7C_pl-99_x7C_st-2_x7C_gz-250">
    <path fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" d="M343.357,485.503h-7.448v11.176
      c0,0,4.004-2.607,7.448-3.166V485.503z"></path>
    <text transform="matrix(1 0 0 1 337.6943 490.4277)" font-family="'MyriadPro-Regular'" font-size="2.8781">99</text>
  </g>
  <g id="sc-B_x7C_pl-90_x7C_st-1_x7C_gz-250">
    
      <rect x="358.352" y="478.703" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.637" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 360.583 483.1826)" font-family="'MyriadPro-Regular'" font-size="2.8781">90</text>
  </g>
  <g id="sc-B_x7C_pl-91_x7C_st-1_x7C_gz-250">
    
      <rect x="358.352" y="471.999" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.637" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 360.8867 476.6582)" font-family="'MyriadPro-Regular'" font-size="2.8781">91</text>
  </g>
  <g id="sc-B_x7C_pl-92_x7C_st-1_x7C_gz-250">
    
      <rect x="358.352" y="465.293" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.637" height="6.706"></rect>
    <text transform="matrix(1 0 0 1 360.583 469.8135)" font-family="'MyriadPro-Regular'" font-size="2.8781">92</text>
  </g>
  <g id="sc-B_x7C_pl-93_x7C_st-1_x7C_gz-250">
    
      <rect x="358.352" y="458.588" fill="#A9CADB" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="7.637" height="6.709"></rect>
    <text transform="matrix(1 0 0 1 360.583 463.0303)" font-family="'MyriadPro-Regular'" font-size="2.8781">93</text>
  </g>
  <g id="sc-B_x7C_pl-8_x7C_st-_x7C_gz-500">
    
      <rect x="365.988" y="458.588" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.414" height="7.546"></rect>
    <g>
      <text transform="matrix(1 0 0 1 371.2871 463.167)" font-family="'MyriadPro-Regular'" font-size="3.3244">8</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-7_x7C_st-_x7C_gz-500">
    
      <rect x="365.896" y="441.079" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.504" height="7.08"></rect>
    <g>
      <text transform="matrix(1 0 0 1 371.4717 445.5947)" font-family="'MyriadPro-Regular'" font-size="3.3244">7</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-6_x7C_st-_x7C_gz-500">
    
      <rect x="365.896" y="433.444" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.504" height="7.547"></rect>
    <g>
      <text transform="matrix(1 0 0 1 371.4717 438.4668)" font-family="'MyriadPro-Regular'" font-size="3.3244">6</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-5_x7C_st-_x7C_gz-500">
    
      <rect x="365.896" y="425.806" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.504" height="7.64"></rect>
    <g>
      <text transform="matrix(1 0 0 1 371.4717 430.7236)" font-family="'MyriadPro-Regular'" font-size="3.3244">5</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-4_x7C_st-_x7C_gz-500">
    
      <rect x="365.896" y="418.261" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.504" height="7.545"></rect>
    <g>
      <text transform="matrix(1 0 0 1 371.4717 423.3311)" font-family="'MyriadPro-Regular'" font-size="3.3244">4</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-3_x7C_st-_x7C_gz-500">
    
      <rect x="365.896" y="410.72" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.504" height="7.544"></rect>
    <g>
      <text transform="matrix(1 0 0 1 371.4697 415.7842)" font-family="'MyriadPro-Regular'" font-size="3.3244">3</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-2_x7C_st-_x7C_gz-500">
    
      <rect x="365.896" y="403.081" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.504" height="7.637"></rect>
    <g>
      <text transform="matrix(1 0 0 1 371.4697 408.1143)" font-family="'MyriadPro-Regular'" font-size="3.3244">2</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-1_x7C_st-_x7C_gz-500">
    
      <rect x="365.896" y="395.538" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.504" height="7.637"></rect>
    <g>
      <text transform="matrix(1 0 0 1 371.4697 400.5791)" font-family="'MyriadPro-Regular'" font-size="3.3244">1</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-1_x7C_st-_x7C_gz-1000">
    
      <rect x="365.803" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.504" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 371.6455 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">1</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-2_x7C_st-_x7C_gz-1000">
    
      <rect x="352.205" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.597" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 358.0967 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">2</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-3_x7C_st-_x7C_gz-1000">
    
      <rect x="332.833" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.417" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 338.5615 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">3</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-4_x7C_st-_x7C_gz-1000">
    
      <rect x="319.33" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.503" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 325.1514 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">4</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-5_x7C_st-_x7C_gz-1000">
    
      <rect x="299.679" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.504" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 305.5234 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">5</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-6_x7C_st-_x7C_gz-1000">
    
      <rect x="286.083" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.595" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 291.9736 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">6</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-7_x7C_st-_x7C_gz-1000">
    
      <rect x="266.712" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.503" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 272.5557 376.9365)" font-family="'MyriadPro-Regular'" font-size="3.4093">7</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-8_x7C_st-_x7C_gz-1000">
    
      <rect x="253.208" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.505" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 259.0518 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">8</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-1_x7C_st-_x7C_gz-1000_1_">
    
      <rect x="233.65" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.506" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 239.4941 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">1</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-2_x7C_st-_x7C_gz-1000_1_">
    
      <rect x="219.96" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.694" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 225.8965 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">2</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-3_x7C_st-_x7C_gz-1000_1_">
    
      <rect x="200.591" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.595" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 206.4795 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">3</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-4_x7C_st-_x7C_gz-1000_1_">
    
      <rect x="187.085" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.501" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 192.9287 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">4</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-5_x7C_st-_x7C_gz-1000_1_">
    
      <rect x="167.619" y="368.344" fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.504" height="14.995"></rect>
    <g>
      <text transform="matrix(1.0411 0 0 1 173.4531 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">5</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-6_x7C_st-_x7C_gz-1000_1_">
    <polygon fill="#ECDE9F" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="159.239,383.339 153.371,368.344 
      167.619,368.344 167.619,383.339     "></polygon>
    <g>
      <text transform="matrix(1.0411 0 0 1 160.2559 376.8438)" font-family="'MyriadPro-Regular'" font-size="3.4093">6</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-9_x7C_st-_x7C_gz-500">
    
      <rect x="365.988" y="466.039" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.414" height="7.546"></rect>
    <g>
      <text transform="matrix(1 0 0 1 371.2871 470.9277)" font-family="'MyriadPro-Regular'" font-size="3.3244">9</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-10_x7C_st-_x7C_gz-500">
    
      <rect x="365.988" y="473.676" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.414" height="7.547"></rect>
    <g>
      <text transform="matrix(1 0 0 1 370.4346 478.8389)" font-family="'MyriadPro-Regular'" font-size="3.3244">10</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-11_x7C_st-_x7C_gz-500">
    
      <rect x="365.988" y="481.126" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.414" height="7.448"></rect>
    <g>
      <text transform="matrix(1 0 0 1 370.4346 486.6631)" font-family="'MyriadPro-Regular'" font-size="3.3244">11</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-12_x7C_st-_x7C_gz-500">
    
      <rect x="365.988" y="488.576" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.414" height="7.546"></rect>
    <g>
      <text transform="matrix(1 0 0 1 370.4346 493.8828)" font-family="'MyriadPro-Regular'" font-size="3.3244">12</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-13_x7C_st-_x7C_gz-500">
    
      <rect x="365.988" y="496.119" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.414" height="7.548"></rect>
    <g>
      <text transform="matrix(1 0 0 1 370.4346 501.5332)" font-family="'MyriadPro-Regular'" font-size="3.3244">13</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-14_x7C_st-_x7C_gz-500">
    <rect x="365.988" y="503.510" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.414" height="7.548"></rect>
    <g>
      <text transform="matrix(1 0 0 1 370.4346 508.874)" font-family="'MyriadPro-Regular'" font-size="3.3244">14</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-15_x7C_st-_x7C_gz-500">
    
      <rect x="365.988" y="511.113" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.414" height="7.546"></rect>
    <g>
      <text transform="matrix(1 0 0 1 370.4346 515.8457)" font-family="'MyriadPro-Regular'" font-size="3.3244">15</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-16_x7C_st-_x7C_gz-500">
    
      <rect x="365.988" y="518.564" fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.414" height="7.449"></rect>
    <g>
      <text transform="matrix(1 0 0 1 370.4346 523.6201)" font-family="'MyriadPro-Regular'" font-size="3.3244">16</text>
    </g>
  </g>
  <g id="sc-B_x7C_pl-17_x7C_st-_x7C_gz-500">
    <polygon fill="#E9D6C8" stroke="#020202" stroke-width="0.25" stroke-miterlimit="10" points="379.398,526.108 365.988,526.108 
      365.896,536.166 379.398,534.583     "></polygon>
    <g>
      <text transform="matrix(1 0 0 1 370.4346 531.751)" font-family="'MyriadPro-Regular'" font-size="3.3244">17</text>
    </g>
  </g>
  
    <line fill="none" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" x1="212.227" y1="481.583" x2="209.715" y2="488.856"></line>
</g>
</svg>




                     <div id="controls">
                        <svg version="1.1">
                            <g transform="translate(10,10)">
                                <g transform="translate(0,47)">
                                    <g cursor="pointer" id="zoomin">
                                        <circle r="15.5" cx="0" cy="0" fill="#FFFFFF" stroke="#000000" fill-opacity="0.7" stroke-width="1" stroke-opacity="0.1"
                                            transform="translate(16,16)"></circle>
                                        <g transform="translate(16,16)" opacity="1" style="pointer-events: none;">
                                            <path cs="100,100" d="M-6.5,0.5 L7.5,0.5" fill="none" stroke-width="1" stroke-opacity="1" stroke="#494949"></path>
                                            <path cs="100,100" d="M0.5,-6.5 L0.5,7.5" fill="none" stroke-width="1" stroke-opacity="1" stroke="#494949"></path>
                                        </g>
                                    </g>
                                    <g cursor="pointer" id="zoomout" transform="translate(0,36)">
                                        <circle r="15.5" cx="0" cy="0" fill="#FFFFFF" stroke="#000000" fill-opacity="0.7" stroke-width="1" stroke-opacity="0.1"
                                            transform="translate(16,16)"></circle>
                                        <path cs="100,100" d="M-6.5,0.5 L7.5,0.5" fill="none" stroke-width="1" stroke-opacity="1" stroke="#494949"
                                            transform="translate(16,16)" opacity="1" style="pointer-events: none;"></path>
                                    </g>
                                </g>
                                <g cursor="pointer" id="resetSVG">
                                    <circle r="15.5" cx="0" cy="0" fill="#FFFFFF" stroke="#000000" fill-opacity="0.7" stroke-width="1" stroke-opacity="0.1"
                                        transform="translate(16,16)"></circle>
                                    <path cs="100,100" d="M-6.5,0.5 L0.5,-6.5 L7.5,0.5 L6.5,0.5 L6.5,6.5 L2.5,6.5 L2.5,2.5 L-1.5,2.5 L-1.5,6.5 L-5.5,6.5 L-5.5,0.5 Z"
                                        fill="#494949" stroke="#494949" fill-opacity="1" stroke-width="1" stroke-opacity="1" transform="translate(16,16)"
                                        opacity="1" style="pointer-events: none;"></path>
                                </g>
                            </g>
                        </svg>
                    </div>


                </div>


                <div class="bg-light border-dark border-top d-flex flex-wrap justify-content-between pb-2 pt-2 px-3">
                  

<div class="half-split">
            Plot Size:        
                      <span data-size="125" class="size-change"><span style="padding: 0px 10px;background:#d4d2c3;margin-right: 5px;"></span>125 sq.yards</span>
                      
                      <span data-size="250" class="size-change"><span style="padding: 0px 10px; background:#9ebac6;margin-right: 5px;"></span>250 sq.yards</span>
                      
                      <span data-size="500" class="size-change"><span style="padding: 0px 10px; background:#d7c6bc;margin-right: 5px;"></span>500 sq.yards</span>
                  
                      <span data-size="1000" class="size-change"><span style="padding: 0px 10px; background:#d9cd93;margin-right: 5px;"></span>1000 sq.yards</span>
                   </div>

<div class="half-split">
            Plot Status:        
                      <span data-size="Vacant" class="size-change">Vacant</span>
                      
                      <span data-size="On Hold" class="size-change">On Hold</span>
                      
                      <span data-size="Booked" class="size-change">Booked</span>
                  
                      <span data-size="Mortgaged" class="size-change">Mortgaged</span>
                   </div>

                </div>
            </div>
    </div>
   


<!-- form -->
<div class="contact-2 pb-5 pt-5 greyBackground booking-form">
	<div class="container">
	  <!-- Main title -->
	  <div class="main-title text-center position-relative">
		<h1>Booking Form</h1>
		<span class="fas fa-times crossIcon"></span>
	  </div>
	   <form action="#" method="POST" enctype="multipart/form-data" class="bookingFormData" id="form-for-booking">
	  </form> 
	</div>
  </div>
<!-- form -->


 
<style>
	.half-split{
	font-size: 12px;
	font-weight: 600;
	margin-bottom: 0;
	}
	.status-booked {
	background: #c5f78a;
	}

	.status-onhold{
	background: #ffeb3b;
	}
	.status-mortgaged{
	background: #aff0f9;
	}
tr:nth-child(odd) {
    background-color: #f2f2f2;
}
</style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="SVGPanZoom.js"></script>



    <script>
        $(document).ready(function(){

         var json=[{
  
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"1",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"2",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"3",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"4",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"5",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"6",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"7",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"8",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"9",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"10",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"11",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"12",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"13",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"14",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"15",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"16",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"17",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"18",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"19",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"20",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"21",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"22",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"23",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"24",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"25",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"26",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"27",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"28",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"29",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"30",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"31",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"32",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"33",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"34",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"35",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"36",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"37",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"38",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"39",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"40",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"41",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"42",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"43",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"44",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"45",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"46",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"47",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"48",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"49",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"50",
 "type":"R1",
 "category":"125",
 "size":"123",
 "permittedheight":"G + 1",
 "costofunit":"1,771,200",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,771,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"51",
 "type":"R1",
 "category":"125",
 "size":"206",
 "permittedheight":"G + 1",
 "costofunit":"2,966,400",
 "cornercharges":"296,640",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"296,640",
 "totalcostofunit":"3,263,040"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"52",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"53",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"54",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"55",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"56",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"57",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"58",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"59",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"60",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"61",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"62",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"63",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"64",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"65",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"66",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"67",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"68",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"69",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"70",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"71",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"72",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"73",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"74",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"75",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"76",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"77",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"78",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"79",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"80",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"81",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"82",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"83",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"84",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"85",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"86",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"87",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"88",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"89",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"90",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"91",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"92",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"93",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"94",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"95",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"96",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"97",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"98",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"99",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"100",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"101",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"102",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"103",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"104",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"105",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"106",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"107",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"108",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"109",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"110",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"720,000",
 "totalcostofunit":"2,520,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"111",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"112",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"113",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"114",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"115",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"116",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"117",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"118",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"119",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"120",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"121",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"122",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"123",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"124",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"125",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"126",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"127",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"128",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"129",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"130",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"131",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"132",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"133",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"134",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"135",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"136",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"137",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"138",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"138",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"140",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"141",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"142",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"143",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"144",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"145",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"146",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"147",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"148",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"720,000",
 "totalcostofunit":"2,520,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"149",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"150",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"151",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"152",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"153",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"154",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"155",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"156",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"157",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"158",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"159",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"160",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"161",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"162",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"163",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"164",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"165",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"166",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"167",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"168",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"169",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"170",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"171",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"172",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"173",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"174",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"175",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"176",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"177",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"178",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"179",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"180",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"181",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"182",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"183",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"184",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"185",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"186",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"720,000",
 "totalcostofunit":"2,520,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"187",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"188",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"189",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"190",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"191",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"192",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"193",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"194",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"195",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"196",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"197",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"198",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"199",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"200",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"201",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"202",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"203",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"204",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"205",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"206",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"207",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"208",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"209",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"210",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"211",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"212",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"213",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"214",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"215",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"216",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"217",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"218",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"219",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"220",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"221",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"222",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"223",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"224",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"720,000",
 "totalcostofunit":"2,520,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"225",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"226",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"227",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"228",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"229",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"230",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"231",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"232",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"233",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"234",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"235",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"236",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"237",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"238",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"239",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"240",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"241",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"242",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"243",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"244",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"245",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"246",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"247",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"248",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"249",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"250",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"251",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"252",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"253",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"254",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"255",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"256",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"257",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"258",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"259",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"260",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"261",
 "type":"R1",
 "category":"125",
 "size":"190",
 "permittedheight":"G + 1",
 "costofunit":"2,736,000",
 "cornercharges":"273,600",
 "parkfacing":"273,600",
 "roadfacing":"273,600",
 "westopen":"273,600",
 "totalexrtracharges":"1,094,400",
 "totalcostofunit":"3,830,400"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"262",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"223,200",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"446,400",
 "totalcostofunit":"2,678,400"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"263",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"264",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"265",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"266",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"267",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"268",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"269",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"270",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"271",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"223,200",
 "westopen":"-",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"272",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"273",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"274",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"275",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"276",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"277",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"278",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"279",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"280",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"281",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"282",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"283",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"284",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"285",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"286",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"287",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"288",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"289",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"290",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"291",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"292",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"293",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"294",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"295",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"296",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"297",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"298",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"299",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"300",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"301",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"302",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"303",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"304",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"305",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"306",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"307",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"308",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"309",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"310",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"311",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"312",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"313",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"314",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"315",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"316",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"317",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"318",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"319",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"320",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"321",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"322",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"323",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"324",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"325",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"326",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"223,200",
 "westopen":"-",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"327",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"223,200",
 "westopen":"-",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"328",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"223,200",
 "westopen":"223,200",
 "totalexrtracharges":"446,400",
 "totalcostofunit":"2,678,400"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"329",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"330",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"331",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"332",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"333",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"334",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"335",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"223,200",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"336",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"337",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"338",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"339",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"340",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"341",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"342",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"343",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"344",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"345",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"346",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"347",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"348",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"349",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"350",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"351",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"352",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"353",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"354",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"355",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"356",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"357",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"358",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"359",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"360",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"361",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"362",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"363",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"364",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"365",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"366",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"367",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"368",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"369",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"370",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"371",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"372",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"373",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"374",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"375",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"376",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"377",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"378",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"379",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"380",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"381",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"382",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"383",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"384",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"385",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"386",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"387",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"388",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"389",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"390",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"391",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"392",
 "type":"R1",
 "category":"125",
 "size":"109",
 "permittedheight":"G + 1",
 "costofunit":"1,569,600",
 "cornercharges":"156,960",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"156,960",
 "totalexrtracharges":"313,920",
 "totalcostofunit":"1,883,520"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"393",
 "type":"R1",
 "category":"125",
 "size":"197",
 "permittedheight":"G + 1",
 "costofunit":"2,836,800",
 "cornercharges":"283,680",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"283,680",
 "totalexrtracharges":"567,360",
 "totalcostofunit":"3,404,160"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"394",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"395",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"396",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"397",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"398",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"399",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"400",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"401",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"402",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"403",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"404",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"405",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"406",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"407",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"408",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"409",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"410",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"411",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"412",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"413",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"414",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"415",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"416",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"417",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"418",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"419",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"420",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"421",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"422",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"423",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"424",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"425",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"426",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"427",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"428",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"429",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"430",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"431",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"432",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"433",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"434",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"435",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"436",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"437",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"438",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"439",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"440",
 "type":"R1",
 "category":"125",
 "size":"158",
 "permittedheight":"G + 1",
 "costofunit":"2,275,200",
 "cornercharges":"227,520",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"227,520",
 "totalexrtracharges":"455,040",
 "totalcostofunit":"2,730,240"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"441",
 "type":"R1",
 "category":"125",
 "size":"122",
 "permittedheight":"G + 1",
 "costofunit":"1,756,800",
 "cornercharges":"175,680",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"175,680",
 "totalexrtracharges":"351,360",
 "totalcostofunit":"2,108,160"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"442",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"443",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"444",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"445",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"446",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"447",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"448",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"449",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"450",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"451",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"452",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"453",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"454",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"455",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"456",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"457",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"458",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"459",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"460",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"461",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"462",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"463",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"464",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"465",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"466",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"467",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"468",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"469",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"470",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"471",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"472",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"473",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"474",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"475",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"476",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"477",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"478",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"479",
 "type":"R1",
 "category":"125",
 "size":"147",
 "permittedheight":"G + 1",
 "costofunit":"2,116,800",
 "cornercharges":"211,680",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"211,680",
 "totalcostofunit":"2,328,480"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"480",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"481",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"482",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"483",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"484",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"485",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"486",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"487",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"488",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"489",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"490",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"491",
 "type":"R1",
 "category":"125",
 "size":"131",
 "permittedheight":"G + 1",
 "costofunit":"1,886,400",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,886,400"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"492",
 "type":"R1",
 "category":"125",
 "size":"131",
 "permittedheight":"G + 1",
 "costofunit":"1,886,400",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"188,640",
 "totalexrtracharges":"188,640",
 "totalcostofunit":"2,075,040"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"493",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"494",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"495",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"496",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"497",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"498",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"499",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"500",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"501",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"502",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"503",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"504",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"505",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"506",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"507",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"508",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"509",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"510",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"511",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"512",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"513",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"514",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"515",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"516",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"517",
 "type":"R1",
 "category":"125",
 "size":"157",
 "permittedheight":"G + 1",
 "costofunit":"2,260,800",
 "cornercharges":"226,080",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"226,080",
 "totalexrtracharges":"452,160",
 "totalcostofunit":"2,712,960"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"518",
 "type":"R1",
 "category":"125",
 "size":"183",
 "permittedheight":"G + 1",
 "costofunit":"2,635,200",
 "cornercharges":"263,520",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"263,520",
 "totalcostofunit":"2,898,720"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"519",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"520",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"521",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"522",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"523",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"524",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"525",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"526",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"527",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"528",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"529",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"530",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"531",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"532",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"533",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"534",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"535",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"536",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"537",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"538",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"539",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"540",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"541",
 "type":"R1",
 "category":"125",
 "size":"167",
 "permittedheight":"G + 1",
 "costofunit":"2,404,800",
 "cornercharges":"-",
 "parkfacing":"240,480",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"240,480",
 "totalcostofunit":"2,645,280"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"542",
 "type":"R1",
 "category":"125",
 "size":"167",
 "permittedheight":"G + 1",
 "costofunit":"2,404,800",
 "cornercharges":"-",
 "parkfacing":"240,480",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"240,480",
 "totalcostofunit":"2,645,280"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"543",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"544",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"545",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"546",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"547",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"548",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"549",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"550",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"551",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"552",
 "type":"R1",
 "category":"125",
 "size":"183",
 "permittedheight":"G + 1",
 "costofunit":"2,635,200",
 "cornercharges":"263,520",
 "parkfacing":"263,520",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"527,040",
 "totalcostofunit":"3,162,240"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"553",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"554",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"555",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"556",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"557",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"558",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"559",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"560",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"561",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"562",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"563",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"564",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"565",
 "type":"R1",
 "category":"125",
 "size":"172",
 "permittedheight":"G + 1",
 "costofunit":"2,476,800",
 "cornercharges":"247,680",
 "parkfacing":"247,680",
 "roadfacing":"247,680",
 "westopen":"-",
 "totalexrtracharges":"743,040",
 "totalcostofunit":"3,219,840"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"566",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"567",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"568",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"569",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"570",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"571",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"572",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"573",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"574",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"575",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"576",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"577",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"578",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"579",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"580",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"581",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"582",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"583",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"584",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"585",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"586",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"587",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"588",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"589",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"590",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"591",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"592",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"593",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"595",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"595",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"596",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"597",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"598",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"599",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"600",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"601",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"602",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"603",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"604",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"605",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"606",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"607",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"608",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"609",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"610",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"611",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"612",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"613",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"614",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"615",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"616",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"617",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"618",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"619",
 "type":"R1",
 "category":"125",
 "size":"145",
 "permittedheight":"G + 1",
 "costofunit":"2,088,000",
 "cornercharges":"208,800",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"208,800",
 "totalexrtracharges":"417,600",
 "totalcostofunit":"2,505,600"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"620",
 "type":"R1",
 "category":"125",
 "size":"123",
 "permittedheight":"G + 1",
 "costofunit":"1,771,200",
 "cornercharges":"177,120",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"177,120",
 "totalcostofunit":"1,948,320"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"621",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"622",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"623",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"624",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"625",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"626",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"627",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"628",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"629",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"630",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"631",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"632",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"633",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"634",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"635",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"636",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"637",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"638",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"639",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"640",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"641",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"642",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"643",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"644",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"645",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"646",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"647",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"648",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"649",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"650",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"651",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"652",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"653",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"654",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"655",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"656",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"657",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"658",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"659",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"660",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"661",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"662",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"663",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"664",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"665",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"666",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"667",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"668",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"669",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"670",
 "type":"R1",
 "category":"125",
 "size":"172",
 "permittedheight":"G + 1",
 "costofunit":"2,476,800",
 "cornercharges":"247,680",
 "parkfacing":"247,680",
 "roadfacing":"247,680",
 "westopen":"-",
 "totalexrtracharges":"743,040",
 "totalcostofunit":"3,219,840"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"671",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"672",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"673",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"674",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"675",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"676",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"677",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"678",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"679",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"680",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"681",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"682",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"683",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"684",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"685",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"686",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"687",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"688",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"689",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"690",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"691",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"692",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"693",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"694",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"695",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"696",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"697",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"698",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"699",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"700",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"701",
 "type":"R1",
 "category":"125",
 "size":"110",
 "permittedheight":"G + 1",
 "costofunit":"1,584,000",
 "cornercharges":"158,400",
 "parkfacing":"-",
 "roadfacing":"158,400",
 "westopen":"-",
 "totalexrtracharges":"316,800",
 "totalcostofunit":"1,900,800"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"702",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"703",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"704",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"705",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"706",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"707",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"708",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"709",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"710",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"711",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"712",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"713",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"714",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"715",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"716",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"717",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"718",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"719",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"720",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"721",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"722",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"723",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"724",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"725",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"726",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"727",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"728",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"729",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"730",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"731",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"720,000",
 "totalcostofunit":"2,520,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"732",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"733",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"734",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"735",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"736",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"737",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"738",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"739",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"740",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"741",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"742",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"743",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"744",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"745",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"746",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"747",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"748",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"749",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"750",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"751",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"752",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"753",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"754",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"755",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"756",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"757",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"758",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"759",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"760",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"761",
 "type":"R1",
 "category":"125",
 "size":"212",
 "permittedheight":"G + 1",
 "costofunit":"3,052,800",
 "cornercharges":"305,280",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"305,280",
 "totalcostofunit":"3,358,080"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"762",
 "type":"R1",
 "category":"125",
 "size":"170",
 "permittedheight":"G + 1",
 "costofunit":"2,448,000",
 "cornercharges":"244,800",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"244,800",
 "totalcostofunit":"2,692,800"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"763",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"764",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"765",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"766",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"767",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"768",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"769",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"770",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"771",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"772",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"773",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"774",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"775",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"776",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"777",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"778",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"779",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"780",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"781",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"782",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"783",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"784",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"785",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"786",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"787",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"788",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"789",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"790",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"791",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"792",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"793",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"794",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"795",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"796",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"797",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"798",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"799",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"800",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"801",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"802",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"803",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"804",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"805",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"806",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"807",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"808",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"809",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"810",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"811",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"812",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"813",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"814",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"815",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"816",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"817",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"818",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"819",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"820",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"821",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"822",
 "type":"R1",
 "category":"125",
 "size":"153",
 "permittedheight":"G + 1",
 "costofunit":"2,203,200",
 "cornercharges":"220,320",
 "parkfacing":"220,320",
 "roadfacing":"-",
 "westopen":"220,320",
 "totalexrtracharges":"660,960",
 "totalcostofunit":"2,864,160"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"823",
 "type":"R1",
 "category":"125",
 "size":"142",
 "permittedheight":"G + 1",
 "costofunit":"2,044,800",
 "cornercharges":"204,480",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"204,480",
 "totalexrtracharges":"408,960",
 "totalcostofunit":"2,453,760"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"824",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"825",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"826",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"827",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"828",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"829",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"830",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"831",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"832",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"833",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"834",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"835",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"836",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"837",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"838",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"839",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"840",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"841",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"842",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"843",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"844",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"845",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"846",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"847",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"848",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"849",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"850",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"851",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"852",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"853",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"854",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"855",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"856",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"857",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"858",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"859",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"860",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"861",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"862",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"863",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"864",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"865",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"866",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"867",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"868",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"869",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"870",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"871",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"872",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"873",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"874",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"875",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"876",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"877",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"878",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"879",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"880",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"881",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"882",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"883",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"884",
 "type":"R1",
 "category":"125",
 "size":"148",
 "permittedheight":"G + 1",
 "costofunit":"2,131,200",
 "cornercharges":"213,120",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"213,120",
 "totalcostofunit":"2,344,320"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"885",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"886",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"887",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"888",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"889",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"890",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"891",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"892",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"893",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"894",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"895",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"896",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"897",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"898",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"899",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"900",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"901",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"902",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"903",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"904",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"905",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"906",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"907",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"908",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"909",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"910",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"911",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"912",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"913",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"914",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"915",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"916",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"917",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"918",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"919",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"920",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"921",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"922",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"923",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"924",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"925",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"926",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"927",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"928",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"929",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"930",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"931",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"932",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"933",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"934",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"935",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"936",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"937",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"938",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"939",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"940",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"941",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"942",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"943",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"944",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"945",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"946",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"947",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"948",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"949",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"950",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"951",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"952",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"953",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"954",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"955",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"956",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"957",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"958",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"959",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"960",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"961",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"962",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"963",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"964",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"965",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"966",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"967",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"968",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"969",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"970",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"971",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"972",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"973",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"974",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"975",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"976",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"977",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"978",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"979",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"980",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"981",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"982",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"983",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"984",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"985",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"986",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"987",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"988",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"989",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"990",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"991",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"992",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"993",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"994",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"995",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"996",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"997",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"998",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"999",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1000",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1001",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1002",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1003",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1004",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1005",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1006",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1007",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1008",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1009",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1010",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1011",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1012",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1013",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1014",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1015",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"223,200",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"446,400",
 "totalcostofunit":"2,678,400"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1016",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1017",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1018",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1019",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1020",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1021",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1022",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1023",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1024",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1025",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1026",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1027",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1028",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1029",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1030",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1031",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1032",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1033",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1034",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1035",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1036",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1037",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1038",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1039",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1040",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1041",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1042",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1043",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1044",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1045",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1046",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1047",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1048",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1049",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1050",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1051",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1052",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1053",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1054",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1055",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1056",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1057",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1058",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1059",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1060",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1061",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1062",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1063",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1064",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1065",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1066",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1067",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1068",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1069",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1070",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1071",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1072",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1073",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1074",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1075",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1076",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1077",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1078",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1079",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1080",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1081",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1082",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1083",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1084",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1085",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1086",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1087",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1088",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1089",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1090",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1091",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1092",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1093",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1094",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1095",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1096",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1097",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1098",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1099",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1100",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1101",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1102",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1103",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1104",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1105",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1106",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1107",
 "type":"R1",
 "category":"125",
 "size":"155",
 "permittedheight":"G + 1",
 "costofunit":"2,232,000",
 "cornercharges":"223,200",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"446,400",
 "totalcostofunit":"2,678,400"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1108",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1109",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1110",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1111",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1112",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1113",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1114",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1115",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1116",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1117",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1118",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1119",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1120",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1121",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1122",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1123",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1124",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1125",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1126",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1127",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1128",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1129",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1130",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1131",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1132",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1133",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1134",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1135",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1136",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1137",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1138",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1139",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1140",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1141",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1142",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1143",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1144",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1145",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1146",
 "type":"R1",
 "category":"125",
 "size":"125",
 "permittedheight":"G + 1",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1147",
 "type":"R1",
 "category":"125",
 "size":"88",
 "permittedheight":"G + 1",
 "costofunit":"1,267,200",
 "cornercharges":"126,720",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"126,720",
 "totalexrtracharges":"253,440",
 "totalcostofunit":"1,520,640"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"1",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"2",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"3",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"4",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"5",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"6",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"7",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"8",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"9",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"10",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"11",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"12",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"13",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"A",
 "plotno":"14",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"15",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"16",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"17",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"18",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"19",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"20",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"21",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"22",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"23",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"24",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"A",
 "plotno":"1",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"A",
 "plotno":"2",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"A",
 "plotno":"3",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"A",
 "plotno":"4",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"5",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"6",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"7",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"8",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"1",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"2",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"3",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"4",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"5",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"6",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"A",
 "plotno":"7",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1144",
 "permittedheight":"250ft",
 "costofunit":"34,320,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"34,320,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"1",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"1,020,000",
 "totalcostofunit":"4,420,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"2",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"3",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"4",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"5",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"6",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"7",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"8",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"9",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"10",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"11",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"12",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"13",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"14",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"15",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"16",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"17",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"18",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"19",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"20",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"340,000",
 "totalexrtracharges":"1,360,000",
 "totalcostofunit":"4,760,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"21",
 "type":"R1",
 "category":"250",
 "size":"246",
 "permittedheight":"G + 1",
 "costofunit":"3,345,600",
 "cornercharges":"334,560",
 "parkfacing":"-",
 "roadfacing":"334,560",
 "westopen":"-",
 "totalexrtracharges":"669,120",
 "totalcostofunit":"4,014,720"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"22",
 "type":"R1",
 "category":"250",
 "size":"246",
 "permittedheight":"G + 1",
 "costofunit":"3,345,600",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"334,560",
 "totalexrtracharges":"334,560",
 "totalcostofunit":"3,680,160"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"23",
 "type":"R1",
 "category":"250",
 "size":"246",
 "permittedheight":"G + 1",
 "costofunit":"3,345,600",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"334,560",
 "totalexrtracharges":"334,560",
 "totalcostofunit":"3,680,160"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"24",
 "type":"R1",
 "category":"250",
 "size":"246",
 "permittedheight":"G + 1",
 "costofunit":"3,345,600",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"334,560",
 "totalexrtracharges":"334,560",
 "totalcostofunit":"3,680,160"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"25",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"26",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"27",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"28",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"29",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"30",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"31",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"32",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"33",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"34",
 "type":"R1",
 "category":"250",
 "size":"215",
 "permittedheight":"G + 1",
 "costofunit":"2,924,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"292,400",
 "totalexrtracharges":"292,400",
 "totalcostofunit":"3,216,400"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"35",
 "type":"R1",
 "category":"250",
 "size":"215",
 "permittedheight":"G + 1",
 "costofunit":"2,924,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"292,400",
 "totalexrtracharges":"292,400",
 "totalcostofunit":"3,216,400"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"36",
 "type":"R1",
 "category":"250",
 "size":"215",
 "permittedheight":"G + 1",
 "costofunit":"2,924,000",
 "cornercharges":"292,400",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"292,400",
 "totalexrtracharges":"584,800",
 "totalcostofunit":"3,508,800"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"37",
 "type":"R1",
 "category":"250",
 "size":"226",
 "permittedheight":"G + 1",
 "costofunit":"3,073,600",
 "cornercharges":"307,360",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"307,360",
 "totalexrtracharges":"614,720",
 "totalcostofunit":"3,688,320"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"38",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"340,000",
 "totalexrtracharges":"1,360,000",
 "totalcostofunit":"4,760,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"39",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"340,000",
 "totalexrtracharges":"1,360,000",
 "totalcostofunit":"4,760,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"40",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"41",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"42",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"43",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"44",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"45",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"46",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"47",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"48",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"49",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"50",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"51",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"52",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"53",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"54",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"55",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"56",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"57",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"58",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"59",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"60",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"61",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"62",
 "type":"R1",
 "category":"250",
 "size":"248",
 "permittedheight":"G + 1",
 "costofunit":"3,372,800",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,372,800"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"63",
 "type":"R1",
 "category":"250",
 "size":"280",
 "permittedheight":"G + 1",
 "costofunit":"3,808,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"380,800",
 "totalexrtracharges":"380,800",
 "totalcostofunit":"4,188,800"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"64",
 "type":"R1",
 "category":"250",
 "size":"280",
 "permittedheight":"G + 1",
 "costofunit":"3,808,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"380,800",
 "totalexrtracharges":"380,800",
 "totalcostofunit":"4,188,800"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"65",
 "type":"R1",
 "category":"250",
 "size":"280",
 "permittedheight":"G + 1",
 "costofunit":"3,808,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"380,800",
 "totalexrtracharges":"380,800",
 "totalcostofunit":"4,188,800"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"66",
 "type":"R1",
 "category":"250",
 "size":"280",
 "permittedheight":"G + 1",
 "costofunit":"3,808,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,808,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"67",
 "type":"R1",
 "category":"250",
 "size":"280",
 "permittedheight":"G + 1",
 "costofunit":"3,808,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,808,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"68",
 "type":"R1",
 "category":"250",
 "size":"227",
 "permittedheight":"G + 1",
 "costofunit":"3,087,200",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,087,200"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"69",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"70",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"71",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"72",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"73",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"74",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"75",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"76",
 "type":"R1",
 "category":"250",
 "size":"237",
 "permittedheight":"G + 1",
 "costofunit":"3,223,200",
 "cornercharges":"322,320",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"322,320",
 "totalexrtracharges":"644,640",
 "totalcostofunit":"3,867,840"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"77",
 "type":"R1",
 "category":"250",
 "size":"202",
 "permittedheight":"G + 1",
 "costofunit":"2,747,200",
 "cornercharges":"274,720",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"274,720",
 "totalexrtracharges":"549,440",
 "totalcostofunit":"3,296,640"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"78",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"79",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"80",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"81",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"82",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"83",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"84",
 "type":"R1",
 "category":"250",
 "size":"230",
 "permittedheight":"G + 1",
 "costofunit":"3,128,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,128,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"85",
 "type":"R1",
 "category":"250",
 "size":"280",
 "permittedheight":"G + 1",
 "costofunit":"3,808,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,808,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"86",
 "type":"R1",
 "category":"250",
 "size":"280",
 "permittedheight":"G + 1",
 "costofunit":"3,808,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,808,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"87",
 "type":"R1",
 "category":"250",
 "size":"280",
 "permittedheight":"G + 1",
 "costofunit":"3,808,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,808,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"88",
 "type":"R1",
 "category":"250",
 "size":"280",
 "permittedheight":"G + 1",
 "costofunit":"3,808,000",
 "cornercharges":"380,800",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"380,800",
 "totalcostofunit":"4,188,800"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"89",
 "type":"R1",
 "category":"250",
 "size":"348",
 "permittedheight":"G + 1",
 "costofunit":"4,732,800",
 "cornercharges":"473,280",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"473,280",
 "totalexrtracharges":"946,560",
 "totalcostofunit":"5,679,360"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"90",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"91",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"92",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"93",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"340,000",
 "totalexrtracharges":"1,360,000",
 "totalcostofunit":"4,760,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"94",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"1,020,000",
 "totalcostofunit":"4,420,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"95",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"96",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"97",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"98",
 "type":"R1",
 "category":"250",
 "size":"274",
 "permittedheight":"G + 1",
 "costofunit":"3,726,400",
 "cornercharges":"372,640",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"372,640",
 "totalcostofunit":"4,099,040"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"99",
 "type":"R1",
 "category":"250",
 "size":"345",
 "permittedheight":"G + 1",
 "costofunit":"4,692,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"469,200",
 "totalexrtracharges":"469,200",
 "totalcostofunit":"5,161,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"100",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"101",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"102",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"103",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"340,000",
 "totalexrtracharges":"1,360,000",
 "totalcostofunit":"4,760,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"104",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"1,020,000",
 "totalcostofunit":"4,420,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"105",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"106",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"107",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"108",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"109",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"110",
 "type":"R1",
 "category":"250",
 "size":"178",
 "permittedheight":"G + 1",
 "costofunit":"2,420,800",
 "cornercharges":"242,080",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"242,080",
 "totalcostofunit":"2,662,880"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"111",
 "type":"R1",
 "category":"250",
 "size":"212",
 "permittedheight":"G + 1",
 "costofunit":"2,883,200",
 "cornercharges":"288,320",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"288,320",
 "totalexrtracharges":"576,640",
 "totalcostofunit":"3,459,840"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"112",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"113",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"114",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"115",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"116",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"117",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"340,000",
 "totalexrtracharges":"1,360,000",
 "totalcostofunit":"4,760,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"118",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"1,020,000",
 "totalcostofunit":"4,420,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"119",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"120",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"121",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"122",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"123",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"124",
 "type":"R1",
 "category":"250",
 "size":"222",
 "permittedheight":"G + 1",
 "costofunit":"3,019,200",
 "cornercharges":"301,920",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"301,920",
 "totalcostofunit":"3,321,120"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"125",
 "type":"R1",
 "category":"250",
 "size":"255",
 "permittedheight":"G + 1",
 "costofunit":"3,468,000",
 "cornercharges":"346,800",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"346,800",
 "totalexrtracharges":"693,600",
 "totalcostofunit":"4,161,600"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"126",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"127",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"128",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"129",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"130",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"131",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"340,000",
 "totalexrtracharges":"1,360,000",
 "totalcostofunit":"4,760,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"132",
 "type":"R1",
 "category":"250",
 "size":"303",
 "permittedheight":"G + 1",
 "costofunit":"4,120,800",
 "cornercharges":"412,080",
 "parkfacing":"412,080",
 "roadfacing":"412,080",
 "westopen":"-",
 "totalexrtracharges":"1,236,240",
 "totalcostofunit":"5,357,040"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"133",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"134",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"135",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"136",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"137",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"138",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"139",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"140",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"141",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"142",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"143",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"340,000",
 "westopen":"340,000",
 "totalexrtracharges":"1,360,000",
 "totalcostofunit":"4,760,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"144",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"145",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"146",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"147",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"148",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"149",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"150",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"151",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"152",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"153",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"154",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"155",
 "type":"R1",
 "category":"250",
 "size":"409",
 "permittedheight":"G + 1",
 "costofunit":"5,562,400",
 "cornercharges":"556,240",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"556,240",
 "totalcostofunit":"6,118,640"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"156",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"157",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"158",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"159",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"160",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"161",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"162",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"163",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"164",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"165",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"166",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"167",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"168",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"169",
 "type":"R1",
 "category":"250",
 "size":"202",
 "permittedheight":"G + 1",
 "costofunit":"2,747,200",
 "cornercharges":"274,720",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"274,720",
 "totalexrtracharges":"549,440",
 "totalcostofunit":"3,296,640"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"170",
 "type":"R1",
 "category":"250",
 "size":"300",
 "permittedheight":"G + 1",
 "costofunit":"4,080,000",
 "cornercharges":"408,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"408,000",
 "totalexrtracharges":"816,000",
 "totalcostofunit":"4,896,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"171",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"172",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"173",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"174",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"175",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"176",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"177",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"178",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"179",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"180",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"181",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"182",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"183",
 "type":"R1",
 "category":"250",
 "size":"250",
 "permittedheight":"G + 1",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"1",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"550,000",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,650,000",
 "totalcostofunit":"7,150,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"2",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"550,000",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"3",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"550,000",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"4",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"550,000",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"5",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"550,000",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"6",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"550,000",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"7",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"550,000",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,650,000",
 "totalcostofunit":"7,150,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"8",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"9",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"10",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"11",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"12",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"13",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"14",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"15",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"16",
 "type":"R1",
 "category":"500",
 "size":"500",
 "permittedheight":"G + 1",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"B",
 "plotno":"17",
 "type":"R1",
 "category":"500",
 "size":"612",
 "permittedheight":"G + 1",
 "costofunit":"6,732,000",
 "cornercharges":"673,200",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"673,200",
 "totalexrtracharges":"1,346,400",
 "totalcostofunit":"8,078,400"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"1",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"2",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"3",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"B",
 "plotno":"4",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"B",
 "plotno":"5",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"B",
 "plotno":"6",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"B",
 "plotno":"7",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"B",
 "plotno":"8",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"B",
 "plotno":"1",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"B",
 "plotno":"2",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"B",
 "plotno":"3",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"B",
 "plotno":"4",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"B",
 "plotno":"5",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"B",
 "plotno":"6",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"839",
 "permittedheight":"250ft",
 "costofunit":"25,170,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"25,170,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"1",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"180,000",
 "totalexrtracharges":"540,000",
 "totalcostofunit":"2,340,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"2",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"3",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"4",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"5",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"6",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"7",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"8",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"9",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"10",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"11",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"12",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"13",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"14",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"15",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"16",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"17",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"18",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"19",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"20",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"21",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"22",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"23",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"24",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"25",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"26",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"27",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"28",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"29",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"180,000",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"30",
 "type":"R2",
 "category":"125",
 "size":"148",
 "permittedheight":"63ft",
 "costofunit":"2,131,200",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"213,120",
 "westopen":"-",
 "totalexrtracharges":"213,120",
 "totalcostofunit":"2,344,320"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"31",
 "type":"R2",
 "category":"125",
 "size":"155",
 "permittedheight":"63ft",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"32",
 "type":"R2",
 "category":"125",
 "size":"155",
 "permittedheight":"63ft",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"33",
 "type":"R2",
 "category":"125",
 "size":"155",
 "permittedheight":"63ft",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"223,200",
 "totalexrtracharges":"223,200",
 "totalcostofunit":"2,455,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"34",
 "type":"R2",
 "category":"125",
 "size":"155",
 "permittedheight":"63ft",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"35",
 "type":"R2",
 "category":"125",
 "size":"155",
 "permittedheight":"63ft",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"36",
 "type":"R2",
 "category":"125",
 "size":"155",
 "permittedheight":"63ft",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"37",
 "type":"R2",
 "category":"125",
 "size":"155",
 "permittedheight":"63ft",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"38",
 "type":"R2",
 "category":"125",
 "size":"155",
 "permittedheight":"63ft",
 "costofunit":"2,232,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"2,232,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"39",
 "type":"R2",
 "category":"125",
 "size":"147",
 "permittedheight":"63ft",
 "costofunit":"2,116,800",
 "cornercharges":"211,680",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"211,680",
 "totalexrtracharges":"423,360",
 "totalcostofunit":"2,540,160"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"40",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"41",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"42",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"43",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"44",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"45",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"46",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"47",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"48",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"49",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"50",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"51",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"52",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"53",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"54",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"55",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"56",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"57",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"58",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"59",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"60",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"61",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"62",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"63",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"64",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"65",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"66",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"67",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"68",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"69",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"70",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"71",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"72",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"73",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"74",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"75",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"76",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"77",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"78",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"79",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"80",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"81",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"82",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"83",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"84",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"85",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"86",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"87",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"88",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"89",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"90",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"91",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"92",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"93",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"94",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"95",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"96",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"97",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"98",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"99",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"100",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"101",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"102",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"103",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"104",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"105",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"106",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"107",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"108",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"109",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"110",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"111",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"112",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"113",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"114",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"115",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"116",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"117",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"118",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"119",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"120",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"121",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"122",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"123",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"124",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"125",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"126",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"127",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"180,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"128",
 "type":"R2",
 "category":"125",
 "size":"167",
 "permittedheight":"63ft",
 "costofunit":"2,404,800",
 "cornercharges":"240,480",
 "parkfacing":"240,480",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"480,960",
 "totalcostofunit":"2,885,760"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"129",
 "type":"R2",
 "category":"125",
 "size":"178",
 "permittedheight":"63ft",
 "costofunit":"2,563,200",
 "cornercharges":"256,320",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"256,320",
 "totalexrtracharges":"512,640",
 "totalcostofunit":"3,075,840"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"130",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"131",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"132",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"133",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"134",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"135",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"136",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"137",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"138",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"139",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"140",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"141",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"142",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"143",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"144",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"145",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"146",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"147",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"148",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"149",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"150",
 "type":"R2",
 "category":"125",
 "size":"241",
 "permittedheight":"63ft",
 "costofunit":"3,470,400",
 "cornercharges":"347,040",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"347,040",
 "totalcostofunit":"3,817,440"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"151",
 "type":"R2",
 "category":"125",
 "size":"215",
 "permittedheight":"63ft",
 "costofunit":"3,096,000",
 "cornercharges":"309,600",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"309,600",
 "totalexrtracharges":"619,200",
 "totalcostofunit":"3,715,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"152",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"153",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"154",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"155",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"156",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"157",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"158",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"159",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"160",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"161",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"162",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"163",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"164",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"165",
 "type":"R2",
 "category":"125",
 "size":"133",
 "permittedheight":"63ft",
 "costofunit":"1,915,200",
 "cornercharges":"191,520",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"191,520",
 "totalexrtracharges":"383,040",
 "totalcostofunit":"2,298,240"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"166",
 "type":"R2",
 "category":"125",
 "size":"133",
 "permittedheight":"63ft",
 "costofunit":"1,915,200",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,915,200"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"167",
 "type":"R2",
 "category":"125",
 "size":"133",
 "permittedheight":"63ft",
 "costofunit":"1,915,200",
 "cornercharges":"191,520",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"191,520",
 "totalcostofunit":"2,106,720"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"168",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"169",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"170",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"171",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"172",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"173",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"174",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"175",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"1,800,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"176",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"177",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"180,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"360,000",
 "totalcostofunit":"2,160,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"178",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"179",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"180",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"181",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"182",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"183",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"184",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"185",
 "type":"R2",
 "category":"125",
 "size":"125",
 "permittedheight":"63ft",
 "costofunit":"1,800,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"180,000",
 "totalexrtracharges":"180,000",
 "totalcostofunit":"1,980,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"1",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"2",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"3",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"4",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"5",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"6",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"7",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"8",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"9",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"10",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"11",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"12",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"13",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"14",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"15",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"C",
 "plotno":"16",
 "type":"R2",
 "category":"500",
 "size":"432",
 "permittedheight":"63ft",
 "costofunit":"4,752,000",
 "cornercharges":"475,200",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"475,200",
 "totalexrtracharges":"950,400",
 "totalcostofunit":"5,702,400"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"1",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"2",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"3",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"4",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"5",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"C",
 "plotno":"6",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"1",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"C",
 "plotno":"2",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1396",
 "permittedheight":"250ft",
 "costofunit":"41,880,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"41,880,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"1",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"340,000",
 "totalexrtracharges":"1,020,000",
 "totalcostofunit":"4,420,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"2",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"3",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"4",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"5",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"6",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"7",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"8",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"9",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"10",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"11",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"12",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"13",
 "type":"R2",
 "category":"250",
 "size":"264",
 "permittedheight":"63ft",
 "costofunit":"3,590,400",
 "cornercharges":"359,040",
 "parkfacing":"-",
 "roadfacing":"359,040",
 "westopen":"-",
 "totalexrtracharges":"718,080",
 "totalcostofunit":"4,308,480"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"14",
 "type":"R2",
 "category":"250",
 "size":"343",
 "permittedheight":"63ft",
 "costofunit":"4,664,800",
 "cornercharges":"466,480",
 "parkfacing":"-",
 "roadfacing":"466,480",
 "westopen":"-",
 "totalexrtracharges":"932,960",
 "totalcostofunit":"5,597,760"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"15",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"16",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"17",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"18",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"19",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"20",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"340,000",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"21",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"22",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"23",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"24",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"25",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"26",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"27",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"28",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"29",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"30",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"31",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"32",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"33",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"34",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"35",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"36",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"37",
 "type":"R2",
 "category":"250",
 "size":"252",
 "permittedheight":"63ft",
 "costofunit":"3,427,200",
 "cornercharges":"342,720",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"342,720",
 "totalcostofunit":"3,769,920"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"38",
 "type":"R2",
 "category":"250",
 "size":"340",
 "permittedheight":"63ft",
 "costofunit":"4,624,000",
 "cornercharges":"462,400",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"462,400",
 "totalcostofunit":"5,086,400"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"39",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"40",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"41",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"42",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"43",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"44",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"45",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"46",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"47",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"48",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"49",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"50",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"51",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"52",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"53",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"54",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"55",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"56",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"57",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"58",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"59",
 "type":"R2",
 "category":"250",
 "size":"249",
 "permittedheight":"63ft",
 "costofunit":"3,386,400",
 "cornercharges":"338,640",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"338,640",
 "totalcostofunit":"3,725,040"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"60",
 "type":"R2",
 "category":"250",
 "size":"328",
 "permittedheight":"63ft",
 "costofunit":"4,460,800",
 "cornercharges":"446,080",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"446,080",
 "totalcostofunit":"4,906,880"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"61",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"62",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"63",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"64",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"65",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"66",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"67",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"68",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"69",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"70",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"71",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"72",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"73",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"74",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"75",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"76",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"77",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"78",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"79",
 "type":"R2",
 "category":"250",
 "size":"238",
 "permittedheight":"63ft",
 "costofunit":"3,236,800",
 "cornercharges":"323,680",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"323,680",
 "totalcostofunit":"3,560,480"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"80",
 "type":"R2",
 "category":"250",
 "size":"319.75",
 "permittedheight":"63ft",
 "costofunit":"4,348,600",
 "cornercharges":"434,860",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"434,860",
 "totalcostofunit":"4,783,460"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"81",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"82",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"83",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"84",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"85",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"86",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"87",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"88",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"89",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"90",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"91",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"3,400,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"92",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"93",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"94",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "sector":"D",
 "plotno":"95",
 "type":"R2",
 "category":"250",
 "size":"253",
 "permittedheight":"63ft",
 "costofunit":"3,440,800",
 "cornercharges":"-",
 "parkfacing":"344,080",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"344,080",
 "totalcostofunit":"3,784,880"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"96",
 "type":"R2",
 "category":"250",
 "size":"253",
 "permittedheight":"63ft",
 "costofunit":"3,440,800",
 "cornercharges":"-",
 "parkfacing":"344,080",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"344,080",
 "totalcostofunit":"3,784,880"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"97",
 "type":"R2",
 "category":"250",
 "size":"253",
 "permittedheight":"63ft",
 "costofunit":"3,440,800",
 "cornercharges":"-",
 "parkfacing":"344,080",
 "roadfacing":"-",
 "westopen":"344,080",
 "totalexrtracharges":"688,160",
 "totalcostofunit":"4,128,960"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"98",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"99",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"100",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"101",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"102",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"103",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"104",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"105",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"106",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"107",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"108",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"109",
 "type":"R2",
 "category":"250",
 "size":"228",
 "permittedheight":"63ft",
 "costofunit":"3,100,800",
 "cornercharges":"-",
 "parkfacing":"310,080",
 "roadfacing":"-",
 "westopen":"310,080",
 "totalexrtracharges":"620,160",
 "totalcostofunit":"3,720,960"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"110",
 "type":"R2",
 "category":"250",
 "size":"228",
 "permittedheight":"63ft",
 "costofunit":"3,100,800",
 "cornercharges":"-",
 "parkfacing":"310,080",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"310,080",
 "totalcostofunit":"3,410,880"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"111",
 "type":"R2",
 "category":"250",
 "size":"228",
 "permittedheight":"63ft",
 "costofunit":"3,100,800",
 "cornercharges":"-",
 "parkfacing":"310,080",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"310,080",
 "totalcostofunit":"3,410,880"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"112",
 "type":"R2",
 "category":"250",
 "size":"228",
 "permittedheight":"63ft",
 "costofunit":"3,100,800",
 "cornercharges":"-",
 "parkfacing":"310,080",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"310,080",
 "totalcostofunit":"3,410,880"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"113",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"114",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"115",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"116",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"117",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"118",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"119",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"120",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"121",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"122",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"340,000",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"123",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"340,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"680,000",
 "totalcostofunit":"4,080,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"124",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"125",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"126",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"127",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"128",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"129",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"130",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"131",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"132",
 "type":"R2",
 "category":"250",
 "size":"250",
 "permittedheight":"63ft",
 "costofunit":"3,400,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"340,000",
 "totalexrtracharges":"340,000",
 "totalcostofunit":"3,740,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"133",
 "type":"R2",
 "category":"250",
 "size":"280",
 "permittedheight":"63ft",
 "costofunit":"3,808,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"380,800",
 "totalexrtracharges":"380,800",
 "totalcostofunit":"4,188,800"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"134",
 "type":"R2",
 "category":"250",
 "size":"304",
 "permittedheight":"63ft",
 "costofunit":"4,134,400",
 "cornercharges":"413,440",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"413,440",
 "totalexrtracharges":"826,880",
 "totalcostofunit":"4,961,280"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"1",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"2",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"3",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"4",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"5",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"6",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"7",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"8",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"9",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"10",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"11",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"12",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"13",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"14",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"15",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"16",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"17",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"18",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"19",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"20",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"21",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"22",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"550,000",
 "totalcostofunit":"6,050,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"23",
 "type":"R2",
 "category":"500",
 "size":"500",
 "permittedheight":"63ft",
 "costofunit":"5,500,000",
 "cornercharges":"550,000",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"550,000",
 "totalexrtracharges":"1,100,000",
 "totalcostofunit":"6,600,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"1",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Booked",
 "sector":"D",
 "plotno":"2",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"3",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"4",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Vacant",
 "sector":"D",
 "plotno":"5",
 "type":"Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"1",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"2",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"1000",
 "permittedheight":"250ft",
 "costofunit":"30,000,000",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"30,000,000"
},
{
    
 "plotstatus":"Mortgage",
 "sector":"D",
 "plotno":"3",
 "type":"Semi Commercial",
 "category":"1000",
 "size":"755.68",
 "permittedheight":"250ft",
 "costofunit":"22,670,400",
 "cornercharges":"-",
 "parkfacing":"-",
 "roadfacing":"-",
 "westopen":"-",
 "totalexrtracharges":"-",
 "totalcostofunit":"22,670,400"
}];



         var instance = new SVGPanZoom(document.getElementById('SVG'), {
                eventMagnet: document.getElementById('SVGContainer'),
                 animationTime: 300,
					zoom: {
					minZoom: Number (0.1),
					maxZoom: Number (100),

					},

            });



            document.getElementById('zoomin').addEventListener('click', function () {
                instance.zoomIn(null, 0.4);
            });
            document.getElementById('zoomout').addEventListener('click', function () {
                instance.zoomOut(null, 0.4);
            });
            document.getElementById('resetSVG').addEventListener('click', function () {
                instance.reset();
            });

       
            $('.close-detail').click(function(){
               $('.p_detail').addClass('p-hide');

            $('.loading').addClass('d-none');
            $('.detail').addClass('d-none');
            });


            $('g').click(function(){

               if($(this).attr('id').split('_x7C_').length==4){
             
              
                  var data=$(this).attr('id').split('_x7C_');
                    var sector=data[0].split('-')[1];
                    var plot=data[1].split('-')[1];
                    var street=data[2].split('-')[1];
                    var ghz=data[3].split('-')[1];


                    var found_in_json = $.grep(json, function(v) {
    return v.sector === sector && v.category == ghz && v.plotno==plot;
});


                    if(found_in_json[0].plotstatus == "Booked"){
                    	var plotstatuscolor = "status-booked";
                    }
                    else if(found_in_json[0].plotstatus == "Mortgage"){
                    	var plotstatuscolor = "status-mortgaged";
                    }
                    else if(found_in_json[0].plotstatus == "On Hold"){
                    	var plotstatuscolor = "status-onhold";
                    }
                    
                    else{
                    	var plotstatuscolor = "";
                    }


            if(found_in_json[0].type=="R"){
               found_in_json[0].type="Residential";
            }
            else if(found_in_json[0].type=="C"){
               found_in_json[0].type="Commercial";
            }

            var cornerchargesshow='';
            	if(found_in_json[0].cornercharges == '-'){
            		 cornerchargesshow= "";
            	} else{
            			cornerchargesshow = `<tr>
                      <td>Corner Charges</td><td>`+found_in_json[0].cornercharges+`</td>
                      </tr>`;
            	}

				
				
					var plotvariants ='';

				if((found_in_json[0].cornercharges == '-') && (found_in_json[0].parkfacing == '-') && (found_in_json[0].roadfacing == '-') && (found_in_json[0].westopen == '-') && (found_in_json[0].totalexrtracharges == '-') ){
					plotvariants = `<span>Preffered Choices: </span>
						<ul>
							<li>10% Extra for Corner</li>
							<li>10% Extra for Boulevard</li>
							<li>10% Extra for Facing Park</li>
							<li></li>
						</ul>`;

				 }
				 else{
plotvariants = `<ul class="list-unstyled">`;
plotvariants +=	found_in_json[0].cornercharges !== '-' ? '<li> <span>Corner Charges: </span> '+found_in_json[0].cornercharges+'</li>' : '';
plotvariants += found_in_json[0].parkfacing  !== '-'  ? '<li> <span>Park Facing Charges: </span>  '+found_in_json[0].parkfacing+'</li>' : '';
plotvariants += found_in_json[0].roadfacing  !== '-'  ? '<li> <span>Road Facing Charges: </span>  '+found_in_json[0].roadfacing+'</li>' : '' ;
plotvariants += found_in_json[0].westopen  !== '-'  ? '<li> <span>West Open Charges: </span>  '+found_in_json[0].westopen+'</li>' : '';
plotvariants += found_in_json[0].totalexrtracharges  !== '-'  ? '<li> <span>Total Extra Charges: </span>  '+found_in_json[0].totalexrtracharges+'</li>' : '';
plotvariants += found_in_json[0].totalcostofunit  !== '-'  ? '<li class="bg-dark border-dark border-top mt-3 px-2 py-2 rounded text-white"> <span class="text-white">Total Cost: </span>  '+found_in_json[0].totalcostofunit+'</li>' : '';

plotvariants += `</ul>`;  				
				 }

				 var booknow="";

				 if(found_in_json[0].plotstatus == "Mortgage" || found_in_json[0].plotstatus == "Booked"){
				 	booknow = "";
				 }
				 	else{
				 		booknow =`<tr>
                     <td colspan='2'><button class="book-now-btn btn btn-block btn-sm btn-success">Book Now</button></td>
                     </tr>`;
				 	}




                    $('.detail-table').html(`
                    	<tr>
                     <td class="">Plot Status</td>
                     <td class=`+plotstatuscolor+`>`+found_in_json[0].plotstatus+`</td>
                     </tr>
                     
                     <tr>
                     <td>Plot No</td><td>`+found_in_json[0].plotno+`</td>
                     </tr>

                     <tr>
                     <td>Actual Plot Size</td><td>`+found_in_json[0].size+`</td>
                     </tr>

                     <tr>
                     <td>Type</td><td>`+found_in_json[0].type+`</td>
                     </tr>

                     <tr>
                     <td>Sector</td><td>`+found_in_json[0].sector+`</td>
                     </tr>

                     <tr>
                     <td>Category</td><td class="">`+found_in_json[0].category+` Sq.Yards</td>
                     </tr>

                     <tr>
                     <td>Permitted Height</td><td>`+found_in_json[0].permittedheight+`</td>
                     </tr>

                     <tr>
                     <td>Cost of Unit</td><td>`+found_in_json[0].costofunit+`</td>
                     </tr>
                    
                    `+cornerchargesshow+`
                     
                      <tr>
                     <td>Park Facing</td><td>`+found_in_json[0].parkfacing+`</td>
                     </tr>
                    
                     <tr>
                     <td>Road Facing</td><td>`+found_in_json[0].roadfacing+`</td>
                     </tr>

                     <tr>
                     <td>West Open</td><td>`+found_in_json[0].westopen+`</td>
                     </tr>

                     <tr>
                     <td>Total Extra Charges</td><td>`+found_in_json[0].totalexrtracharges+`</td>
                     </tr>
						
                     <tr>
                     <td>Total Cost of Unit</td><td class="font-weight-bolder text-white bg-secondary">`+found_in_json[0].totalcostofunit+`</td>
                     </tr>

                     `+booknow+`					

                     `);
                  
           
            $('.p_detail').removeClass('p-hide');

            $('.loading').removeClass('d-none');
            $('.detail').addClass('d-none');

               setTimeout(function(){
                  $('.loading').addClass('d-none');
                  $('.detail').removeClass('d-none');
               },2000);
            }

           
			$('.book-now-btn').click(function(){
				$('.booking-form').addClass('form-display');


				$('.bookingFormData').html(`
					<fieldset>
					<legend class="legend-heading">Property Selected</legend>

					<div class="row">
						<div class="mb-3 form-check form-text col-md-6">
						<div>
						  <span>Plot No:</span>
						  <p>`+found_in_json[0].plotno+`</p>
						</div>

						<div>
						  <span>Residential Units:</span>
						  <p>`+found_in_json[0].size+` Sq.Yards</p>
						</div>

						<div>
						  <span>Type:</span>
						  <p>`+found_in_json[0].type+`</p>
						</div>

						<div>
						  <span>Sector:</span>
						  <p>`+found_in_json[0].sector+`</p>
						</div>

						<div>
						  <span>Category:</span>
						  <p>`+found_in_json[0].category+`</p>
						</div>

						<div>
						  <span>Cost Of Unit:</span>
						  <p>`+found_in_json[0].costofunit+`</p>
						</div>
					
						</div>

					
						<div class="mb-3 form-check form-text col-md-6">
						` + plotvariants +`
						</div>
					

					</div>	
					</fieldset>

					<fieldset class="mt-4">
					<legend class="legend-heading">Personal Information</legend>


					<input type="hidden" value="`+found_in_json[0].size+`" name="Plotsize">
					<input type="hidden" value="`+found_in_json[0].size+`" name="residentialUnit">
					<input type="hidden" value="`+found_in_json[0].type+`" name="type">
					<input type="hidden" value="`+found_in_json[0].sector+`" name="sector">
					<input type="hidden" value="`+found_in_json[0].category+`" name="category">
					<input type="hidden" value="`+found_in_json[0].costofunit+`" name="cost-of-unit">

					<div class="row">
						<div class="mb-3 col-md-6">
						<input
							type="text"
							class="form-control"
							placeholder="Name of Applicant"
							required
							name="nameofapplicant"
						/>
						</div>

						<div class="mb-3 col-md-6">
						<input
							type="text"
							class="form-control"
							placeholder="S/O, D/O, W/O"
							required
							name="s/o-d/o"
						/>
						</div>

						<div class="mb-3 col-md-6">
						<input
							type="text"
							data-inputmask="'mask': '99999-9999999-9'"
							class="form-control"
							placeholder="Enter Your CNIC Number"
							name="cnic"
							required=""
						/>
						</div>

						<div class="mb-3 col-md-6">
						<input
							type="text"
							class="form-control"
							placeholder="Passport Number"
							name="passportnumber"
							required=""
						/>
						</div>

						<div class="mb-3 col-md-6">
						<input
							type="text"
							class="form-control"
							placeholder="Date of Birth"
							name="dateofbirth"
							onfocus="(this.type='date')"
							id="date"
							required
						/>
						</div>

						<div class="mb-3 col-md-6">
						<input
							type="tel"
							class="form-control"
							placeholder="Phone Office"
							name="phoneoffice"
						/>
						</div>

						<div class="mb-3 col-md-6">
						<input
							type="tel"
							class="form-control"
							placeholder="Residential No."
							name="phoneresidence"
							required
						/>
						</div>

						<div class="mb-3 col-md-6">
						<input
							type="tel"
							class="form-control"
							placeholder="Mobile No."
							name="mobileno"
							required
						/>
						</div>

						<div class="mb-3 col-md-6">
						<input
							type="email"
							class="form-control"
							placeholder="Email"
							name="email"
							required
						/>
						</div>

						<div class="mb-3 col-md-6">
						<textarea
							class="form-control"
							name="mailing-address"
							placeholder="Mailing Address"
							style="min-height: 50px !important"
						></textarea>
						</div>

						<div class="mb-3 col-md-12">
						<textarea
							class="form-control"
							name="permanent-address"
							placeholder="Permenant Address"
							style="min-height: 70px !important"
						></textarea>
						</div>
					</div>
					</fieldset>
					<div class="d-flex justify-content-end mt-3">
					<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				`);  


			});

			$('.crossIcon').click(function(){
				$('.booking-form').removeClass('form-display');
		    });
        





            });


            $('g').mouseenter(function(){

                if($(this).attr('id').split('_x7C_').length==4){
                 
                    var data=$(this).attr('id').split('_x7C_');
                    var sector=data[0].split('-')[1];
                    var plot=data[1].split('-')[1];
                    var street=data[2].split('-')[1];
                    var ghz=data[3].split('-')[1];
                    

                    $('.tp').css({
                      'display':'block',
                      'left':($(this).offset().left-70),
                      'top':($(this).offset().top-40)
                    });


               $('.st').text(street);
               $('.pln').text(plot);


                }

            });

            $('g').mouseleave(function(){
               $('.tp').css({'display':'none'});
            });


  $('.size-change').click(function(){


               var size=$(this).data('size');
               if(size!='all'){
             	$('#Sector-A,#sector-B,#sector-C,#sector-D').children('g').each(function(){
             		
					$(this).find('polygon').eq(0).removeClass('highlight');
					$(this).find('path').eq(0).removeClass('highlight');
					$(this).find('rect').eq(0).removeClass('highlight');
					$(this).find('polyline').eq(0).removeClass('highlight');


if($(this).attr('id').split('_x7C_').length==4){




var data=$(this).attr('id').split('_x7C_');
var ghz=data[3].split('gz-')[1];

if(ghz==size){


  if($(this).find('polygon').length>0 || $(this).find('rect').length>0 || $(this).find('polyline').length>0){
  $(this).find('polygon').eq(0).addClass('highlight');
  $(this).find('rect').eq(0).addClass('highlight');
  $(this).find('polyline').eq(0).addClass('highlight');
  }
    else{
       $(this).find('path').eq(0).addClass('highlight');
    }
}
  }

});

}
   
});

});
</script>

<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"
></script>


<!-- FORM -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/toastr.js"></script>

<script>
	$(document).ready(function(){
		$('#form-for-booking').submit(function(e){
			$.ajax({
				type:"POST",
				url:"process.php",
				data:$('#form-for-booking').serialize(),
				success:function(data){
					Command: toastr["success"]("Your request have been succesfully submitted!")
					toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": true,
					"positionClass": "toast-top-full-width",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
 					}

	        		$('.booking-form').removeClass('form-display');
				}
			});




			console.log('form submitted');

            e.preventDefault();
		})
	})
</script>
<!-- FORM -->



</body>
</html>