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

                  

<svg version="1.1" id="SVG" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-426.1034128241241 171.49409353733063 1298.7500429153442 1843.593716621399" style="enable-background:new 0 0 831.2 1179.9;" xml:space="preserve" preserveAspectRatio="xMidYMid meet">
<style type="text/css">
g rect,
rect + text,
polygon + text {
    cursor: pointer;
}

</style>
<path fill="#858B90" d="M58.976,195.027h411.869l73.815,232.024c0,0,2.616,26.542-36.165,51.379L239.015,633.11
  c0,0-32.106,15.765-64.174,49.895c-32.086,34.125-50.077,47.683-50.077,47.683l-65.788,8.066V215.722V195.027z"/>
<g id="garden-elements-sector-c">
  <path fill="#7DA84E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M470.446,314.358h34.499l28.704,92.491
    c4.061,11.024-3.486,28.114-11.598,37.11c-9.279,9.569-18.254,15.369-29.286,23.49c-80.893,46.395-162.066,93.068-242.962,139.742
    V472.377h189.899l-0.149-49.819l-0.128-40.634l29.57,13.333l17.396-7.253l17.686-23.486l0.281-23.196l-13.335-16.234l-21.449-7.25
    L470.446,314.358z"/>
  <polygon fill="#7BA853" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="102.23,720.548 86.282,733.594 
    71.495,733.594 71.495,718.81 95.562,717.65  "/>
  <g>
    <circle fill="#7FA280" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" cx="210.662" cy="480.779" r="12.754"/>
  </g>
  <g>
    <rect x="348.669" y="344.794" fill="#FFFFFF" width="3.771" height="0.868"/>
    <rect x="355.343" y="344.794" fill="#FFFFFF" width="3.767" height="0.868"/>
    <rect x="362.012" y="344.503" fill="#FFFFFF" width="3.764" height="0.877"/>
    <rect x="369.257" y="344.794" fill="#FFFFFF" width="3.769" height="0.868"/>
    <rect x="375.347" y="344.794" fill="#FFFFFF" width="3.769" height="0.868"/>
    <rect x="382.013" y="344.794" fill="#FFFFFF" width="3.769" height="0.868"/>
    <rect x="388.682" y="344.794" fill="#FFFFFF" width="3.769" height="0.868"/>
    <rect x="395.061" y="344.794" fill="#FFFFFF" width="3.492" height="0.868"/>
    <rect x="401.727" y="344.794" fill="#FFFFFF" width="3.493" height="0.868"/>
    <rect x="408.398" y="344.503" fill="#FFFFFF" width="3.489" height="0.877"/>
    <rect x="414.774" y="344.794" fill="#FFFFFF" width="3.477" height="0.868"/>
    <rect x="421.443" y="344.794" fill="#FFFFFF" width="3.484" height="0.868"/>
    <rect x="428.404" y="344.794" fill="#FFFFFF" width="3.489" height="0.868"/>
    <rect x="435.36" y="344.794" fill="#FFFFFF" width="3.481" height="0.868"/>
    <rect x="442.029" y="344.794" fill="#FFFFFF" width="3.483" height="0.868"/>
    <rect x="448.119" y="344.794" fill="#FFFFFF" width="3.484" height="0.868"/>
    <rect x="454.784" y="344.503" fill="#FFFFFF" width="3.484" height="0.877"/>
    <g>
      <rect x="371.867" y="341.896" fill="#403F2B" width="24.347" height="6.667"/>
      
        <text transform="matrix(1 9.300148e-004 -9.300148e-004 1 378.2852 346.5205)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">LANE 3</text>
    </g>
    <rect x="161.373" y="343.925" fill="#FFFFFF" width="3.492" height="0.869"/>
    <rect x="167.465" y="343.925" fill="#FFFFFF" width="3.479" height="0.869"/>
    <rect x="174.131" y="343.925" fill="#FFFFFF" width="3.479" height="0.869"/>
    <rect x="180.51" y="343.925" fill="#FFFFFF" width="3.495" height="0.869"/>
    <rect x="161.373" y="343.925" fill="#FFFFFF" width="3.492" height="0.869"/>
    <rect x="167.465" y="343.925" fill="#FFFFFF" width="3.479" height="0.869"/>
    <rect x="174.131" y="343.925" fill="#FFFFFF" width="3.479" height="0.869"/>
    <rect x="180.51" y="343.925" fill="#FFFFFF" width="3.495" height="0.869"/>
    <rect x="134.119" y="343.925" fill="#FFFFFF" width="3.484" height="0.869"/>
    <rect x="140.795" y="344.207" fill="#FFFFFF" width="3.481" height="0.876"/>
    <rect x="147.749" y="344.207" fill="#FFFFFF" width="3.487" height="0.876"/>
    <rect x="154.123" y="344.207" fill="#FFFFFF" width="3.484" height="0.876"/>
    <rect x="187.182" y="344.207" fill="#FFFFFF" width="3.489" height="0.876"/>
    <rect x="187.182" y="344.207" fill="#FFFFFF" width="3.489" height="0.876"/>
    <rect x="194.137" y="344.207" fill="#FFFFFF" width="3.495" height="0.876"/>
    <rect x="200.519" y="344.207" fill="#FFFFFF" width="3.474" height="0.876"/>
    <rect x="207.186" y="344.207" fill="#FFFFFF" width="3.477" height="0.876"/>
    <rect x="213.564" y="343.925" fill="#FFFFFF" width="3.484" height="0.869"/>
    <rect x="220.523" y="343.925" fill="#FFFFFF" width="3.485" height="0.869"/>
    <rect x="227.189" y="344.207" fill="#FFFFFF" width="3.482" height="0.876"/>
    <rect x="233.858" y="344.207" fill="#FFFFFF" width="3.484" height="0.876"/>
    <rect x="240.526" y="344.207" fill="#FFFFFF" width="3.488" height="0.876"/>
    <rect x="246.617" y="344.207" fill="#FFFFFF" width="3.489" height="0.876"/>
    <rect x="253.572" y="344.207" fill="#FFFFFF" width="3.482" height="0.876"/>
    <rect x="259.951" y="343.925" fill="#FFFFFF" width="3.492" height="0.869"/>
    <rect x="266.909" y="343.925" fill="#FFFFFF" width="3.484" height="0.869"/>
    <rect x="273.289" y="344.207" fill="#FFFFFF" width="3.49" height="0.876"/>
    <g>
      <rect x="201.964" y="340.743" fill="#403F2B" width="24.344" height="6.661"/>
      
        <text transform="matrix(1 9.300148e-004 -9.300148e-004 1 207.9199 345.3291)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">LANE 3</text>
    </g>
    
      <text transform="matrix(1.1029 -0.004 0.0036 1 285.6206 347.3413)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="6.6993">40’-0” WIDE ROAD</text>
  </g>
  <g>
    <rect x="372.154" y="405.396" fill="#FFFFFF" width="3.771" height="0.861"/>
    <rect x="379.115" y="405.396" fill="#FFFFFF" width="3.483" height="0.861"/>
    <rect x="385.492" y="405.396" fill="#FFFFFF" width="3.771" height="0.861"/>
    <rect x="392.45" y="405.396" fill="#FFFFFF" width="3.771" height="0.861"/>
    <rect x="399.121" y="405.396" fill="#FFFFFF" width="3.77" height="0.861"/>
    <rect x="405.79" y="405.096" fill="#FFFFFF" width="3.771" height="0.875"/>
    <rect x="412.17" y="405.396" fill="#FFFFFF" width="3.492" height="0.861"/>
    <rect x="418.833" y="405.396" fill="#FFFFFF" width="3.494" height="0.861"/>
    <g>
      <rect x="395.351" y="401.622" fill="#403F2B" width="24.344" height="6.664"/>
      
        <text transform="matrix(1 9.300148e-004 -9.300148e-004 1 401.6689 406.1846)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">LANE 2</text>
    </g>
    <rect x="191.237" y="405.096" fill="#FFFFFF" width="3.497" height="0.875"/>
    <rect x="197.614" y="405.096" fill="#FFFFFF" width="3.482" height="0.875"/>
    <rect x="204.577" y="405.096" fill="#FFFFFF" width="3.49" height="0.875"/>
    <rect x="191.237" y="405.096" fill="#FFFFFF" width="3.497" height="0.875"/>
    <rect x="197.614" y="405.096" fill="#FFFFFF" width="3.482" height="0.875"/>
    <rect x="204.577" y="405.096" fill="#FFFFFF" width="3.49" height="0.875"/>
    <rect x="210.951" y="404.813" fill="#FFFFFF" width="3.485" height="0.871"/>
    <rect x="210.951" y="404.813" fill="#FFFFFF" width="3.485" height="0.871"/>
    <rect x="217.328" y="404.813" fill="#FFFFFF" width="3.484" height="0.871"/>
    <rect x="223.71" y="404.813" fill="#FFFFFF" width="3.49" height="0.871"/>
    <rect x="230.668" y="405.096" fill="#FFFFFF" width="3.479" height="0.875"/>
    <rect x="237.332" y="405.096" fill="#FFFFFF" width="3.484" height="0.875"/>
    <rect x="243.713" y="405.096" fill="#FFFFFF" width="3.495" height="0.875"/>
    <rect x="250.964" y="405.096" fill="#FFFFFF" width="3.484" height="0.875"/>
    <rect x="257.054" y="405.096" fill="#FFFFFF" width="3.492" height="0.875"/>
    <rect x="264.009" y="404.813" fill="#FFFFFF" width="3.498" height="0.871"/>
    <rect x="270.391" y="404.813" fill="#FFFFFF" width="3.482" height="0.871"/>
    <rect x="277.35" y="405.096" fill="#FFFFFF" width="3.492" height="0.875"/>
    <rect x="283.727" y="405.096" fill="#FFFFFF" width="3.479" height="0.875"/>
    <rect x="290.105" y="405.096" fill="#FFFFFF" width="3.484" height="0.875"/>
    <rect x="296.485" y="405.096" fill="#FFFFFF" width="3.49" height="0.875"/>
    <g>
      <rect x="225.16" y="401.622" fill="#403F2B" width="24.346" height="6.664"/>
      
        <text transform="matrix(1 9.300148e-004 -9.300148e-004 1 231.3169 406.1816)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">LANE 2</text>
    </g>
    
      <text transform="matrix(1.1029 -0.004 0.0036 1 309.0195 408.1885)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="6.6993">40’-0” WIDE ROAD</text>
  </g>
  <g>
    <rect x="373.604" y="463.668" fill="#FFFFFF" width="3.769" height="0.87"/>
    <rect x="380.273" y="463.668" fill="#FFFFFF" width="3.773" height="0.87"/>
    <rect x="386.655" y="463.668" fill="#FFFFFF" width="3.771" height="0.87"/>
    <rect x="393.318" y="463.668" fill="#FFFFFF" width="3.774" height="0.87"/>
    <rect x="399.989" y="463.381" fill="#FFFFFF" width="3.771" height="0.866"/>
    <rect x="406.369" y="463.381" fill="#FFFFFF" width="3.769" height="0.866"/>
    <rect x="412.746" y="463.668" fill="#FFFFFF" width="3.771" height="0.87"/>
    <rect x="419.704" y="463.668" fill="#FFFFFF" width="3.495" height="0.87"/>
    <g>
      <rect x="396.803" y="459.606" fill="#403F2B" width="24.346" height="6.672"/>
      
        <text transform="matrix(1 9.300148e-004 -9.300148e-004 1 402.582 464.3496)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">LANE 1</text>
    </g>
    <rect x="191.822" y="463.092" fill="#FFFFFF" width="3.479" height="0.863"/>
    <rect x="198.777" y="463.092" fill="#FFFFFF" width="3.49" height="0.863"/>
    <rect x="204.867" y="462.805" fill="#FFFFFF" width="3.481" height="0.863"/>
    <rect x="191.822" y="463.092" fill="#FFFFFF" width="3.479" height="0.863"/>
    <rect x="198.777" y="463.092" fill="#FFFFFF" width="3.49" height="0.863"/>
    <rect x="204.867" y="462.805" fill="#FFFFFF" width="3.481" height="0.863"/>
    <rect x="211.823" y="462.805" fill="#FFFFFF" width="3.487" height="0.863"/>
    <rect x="211.823" y="462.805" fill="#FFFFFF" width="3.487" height="0.863"/>
    <rect x="218.491" y="462.805" fill="#FFFFFF" width="3.487" height="0.863"/>
    <rect x="225.16" y="462.805" fill="#FFFFFF" width="3.484" height="0.863"/>
    <rect x="231.829" y="463.092" fill="#FFFFFF" width="3.482" height="0.863"/>
    <rect x="238.205" y="463.092" fill="#FFFFFF" width="3.488" height="0.863"/>
    <rect x="245.167" y="463.092" fill="#FFFFFF" width="3.48" height="0.863"/>
    <rect x="251.543" y="462.805" fill="#FFFFFF" width="3.495" height="0.863"/>
    <rect x="258.503" y="462.805" fill="#FFFFFF" width="3.488" height="0.863"/>
    <rect x="264.588" y="462.805" fill="#FFFFFF" width="3.48" height="0.863"/>
    <rect x="271.26" y="462.805" fill="#FFFFFF" width="3.479" height="0.863"/>
    <rect x="277.928" y="463.092" fill="#FFFFFF" width="3.487" height="0.863"/>
    <rect x="284.595" y="463.092" fill="#FFFFFF" width="3.484" height="0.863"/>
    <rect x="291.555" y="462.805" fill="#FFFFFF" width="3.496" height="0.863"/>
    <rect x="297.935" y="462.805" fill="#FFFFFF" width="3.484" height="0.863"/>
    <g>
      <rect x="226.321" y="459.902" fill="#403F2B" width="24.346" height="6.663"/>
      
        <text transform="matrix(1 9.300148e-004 -9.300148e-004 1 232.2207 464.3545)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">LANE 1</text>
    </g>
    
      <text transform="matrix(1.1029 -0.004 0.0036 1 309.9268 466.3643)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="6.6993">40’-0” WIDE ROAD</text>
  </g>
  <g>
    <rect x="402.602" y="298.117" fill="#FFFFFF" width="6.078" height="1.164"/>
    <rect x="386.363" y="298.117" fill="#FFFFFF" width="6.085" height="1.164"/>
    <rect x="370.996" y="298.117" fill="#FFFFFF" width="6.085" height="1.164"/>
    <rect x="452.467" y="297.823" fill="#FFFFFF" width="6.087" height="1.161"/>
    <rect x="436.81" y="298.117" fill="#FFFFFF" width="6.08" height="1.164"/>
    <rect x="420.572" y="298.117" fill="#FFFFFF" width="6.08" height="1.164"/>
    <rect x="354.467" y="297.823" fill="#FFFFFF" width="6.079" height="1.161"/>
    <rect x="338.233" y="297.823" fill="#FFFFFF" width="6.077" height="1.161"/>
    <rect x="322.291" y="298.407" fill="#FFFFFF" width="6.082" height="1.165"/>
    <rect x="306.34" y="298.117" fill="#FFFFFF" width="6.087" height="1.164"/>
    <rect x="290.105" y="298.117" fill="#FFFFFF" width="6.075" height="1.164"/>
    <rect x="192.977" y="298.117" fill="#FFFFFF" width="6.09" height="1.164"/>
    <rect x="178.479" y="297.823" fill="#FFFFFF" width="6.077" height="1.161"/>
    <rect x="162.533" y="297.823" fill="#FFFFFF" width="6.09" height="1.161"/>
    <rect x="147.749" y="298.117" fill="#FFFFFF" width="6.077" height="1.164"/>
    <rect x="132.382" y="297.823" fill="#FFFFFF" width="6.079" height="1.161"/>
    <rect x="117.594" y="298.117" fill="#FFFFFF" width="6.085" height="1.164"/>
    <rect x="102.52" y="298.117" fill="#FFFFFF" width="6.087" height="1.164"/>
    <rect x="87.153" y="298.117" fill="#FFFFFF" width="6.083" height="1.164"/>
    <rect x="72.079" y="297.823" fill="#FFFFFF" width="6.072" height="1.161"/>
    <g>
      <text transform="matrix(1 0 0 1 212.0708 301.9956)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="9.8693">80’-0” WIDE ROAD</text>
    </g>
  </g>
  <g>
    <rect x="119.044" y="323.626" fill="#6F5E2A" width="6.671" height="24.354"/>
    
      <text transform="matrix(9.299793e-004 -1 1 9.299793e-004 123.6191 343.3228)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">STREET 1</text>
  </g>
  <rect x="121.073" y="468.89" fill="#FFFFFF" width="0.868" height="3.487"/>
  <rect x="121.073" y="468.89" fill="#FFFFFF" width="0.868" height="3.487"/>
  <rect x="121.073" y="462.508" fill="#FFFFFF" width="0.868" height="3.483"/>
  <rect x="121.073" y="462.508" fill="#FFFFFF" width="0.868" height="3.483"/>
  <rect x="121.073" y="455.552" fill="#FFFFFF" width="0.868" height="3.492"/>
  <rect x="121.073" y="448.883" fill="#FFFFFF" width="0.868" height="3.479"/>
  <rect x="121.073" y="442.212" fill="#FFFFFF" width="0.868" height="3.487"/>
  <rect x="120.784" y="435.546" fill="#FFFFFF" width="0.874" height="3.479"/>
  <rect x="120.784" y="429.165" fill="#FFFFFF" width="0.874" height="3.485"/>
  <rect x="121.657" y="356.678" fill="#FFFFFF" width="0.869" height="3.484"/>
  <rect x="121.657" y="350.304" fill="#FFFFFF" width="0.869" height="3.486"/>
  <g>
    <rect x="117.886" y="449.463" fill="#6F5E2A" width="6.668" height="24.343"/>
    
      <text transform="matrix(9.299793e-004 -1 1 9.299793e-004 122.4106 469.5684)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">STREET 1</text>
  </g>
  
    <text transform="matrix(-0.004 -1.1029 1 -0.0036 123.9233 420.8809)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="6.6993">40’-0” WIDE ROAD</text>
  <rect x="180.221" y="392.631" fill="#FFFFFF" width="0.869" height="3.483"/>
  <rect x="180.221" y="392.631" fill="#FFFFFF" width="0.869" height="3.483"/>
  <rect x="179.927" y="385.964" fill="#FFFFFF" width="0.871" height="3.476"/>
  <rect x="179.927" y="385.964" fill="#FFFFFF" width="0.871" height="3.476"/>
  <rect x="180.221" y="379.297" fill="#FFFFFF" width="0.869" height="3.482"/>
  <rect x="180.221" y="372.63" fill="#FFFFFF" width="0.869" height="3.479"/>
  <rect x="180.221" y="365.965" fill="#FFFFFF" width="0.869" height="3.48"/>
  <rect x="180.221" y="359.579" fill="#FFFFFF" width="0.869" height="3.483"/>
  <rect x="180.221" y="353.204" fill="#FFFFFF" width="0.869" height="3.484"/>
  <g>
    <rect x="177.031" y="386.833" fill="#6F5E2A" width="6.669" height="24.354"/>
    
      <text transform="matrix(9.299793e-004 -1 1 9.299793e-004 182.146 407.0264)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">STREET 2</text>
  </g>
  
    <text transform="matrix(-0.004 -1.1029 1 -0.0036 183.998 473.7266)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="6.6993">40’-0” WIDE ROAD</text>
  <g>
    <rect x="117.886" y="512.379" fill="#6F5E2A" width="6.668" height="24.343"/>
    
      <text transform="matrix(9.299793e-004 -1 1 9.299793e-004 122.395 532.3867)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">STREET 1</text>
  </g>
  <rect x="119.623" y="657.632" fill="#FFFFFF" width="0.871" height="3.494"/>
  <rect x="119.623" y="657.632" fill="#FFFFFF" width="0.871" height="3.494"/>
  <rect x="119.915" y="651.547" fill="#FFFFFF" width="0.869" height="3.492"/>
  <rect x="119.915" y="651.547" fill="#FFFFFF" width="0.869" height="3.492"/>
  <rect x="119.915" y="644.881" fill="#FFFFFF" width="0.869" height="3.488"/>
  <rect x="119.915" y="638.204" fill="#FFFFFF" width="0.869" height="3.497"/>
  <rect x="119.915" y="631.537" fill="#FFFFFF" width="0.869" height="3.494"/>
  <rect x="119.915" y="624.871" fill="#FFFFFF" width="0.869" height="3.494"/>
  <rect x="119.623" y="618.203" fill="#FFFFFF" width="0.871" height="3.488"/>
  <rect x="120.494" y="546.009" fill="#FFFFFF" width="0.871" height="3.487"/>
  <rect x="120.494" y="539.34" fill="#FFFFFF" width="0.871" height="3.484"/>
  <g>
    <rect x="116.436" y="638.788" fill="#6F5E2A" width="6.666" height="24.345"/>
    
      <text transform="matrix(9.299793e-004 -1 1 9.299793e-004 121.1753 658.6348)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">STREET 1 </text>
  </g>
  
    <text transform="matrix(-0.004 -1.1029 1 -0.0036 122.7041 609.9717)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="6.6993">40’-0” WIDE ROAD</text>
  <g>
    <rect x="178.771" y="512.666" fill="#6F5E2A" width="6.669" height="24.345"/>
    
      <text transform="matrix(9.299793e-004 -1 1 9.299793e-004 183.3652 532.25)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">STREET 2</text>
  </g>
  <rect x="181.671" y="635.31" fill="#FFFFFF" width="0.869" height="3.487"/>
  <rect x="181.671" y="635.31" fill="#FFFFFF" width="0.869" height="3.487"/>
  <rect x="181.671" y="628.926" fill="#FFFFFF" width="0.869" height="3.495"/>
  <rect x="181.671" y="628.926" fill="#FFFFFF" width="0.869" height="3.495"/>
  <rect x="181.671" y="622.261" fill="#FFFFFF" width="0.869" height="3.48"/>
  <rect x="181.671" y="615.593" fill="#FFFFFF" width="0.869" height="3.483"/>
  <rect x="181.671" y="608.925" fill="#FFFFFF" width="0.869" height="3.475"/>
  <rect x="181.671" y="602.251" fill="#FFFFFF" width="0.869" height="3.485"/>
  <rect x="181.671" y="595.588" fill="#FFFFFF" width="0.869" height="3.485"/>
  <g>
    <rect x="178.192" y="616.179" fill="#6F5E2A" width="6.666" height="24.352"/>
    
      <text transform="matrix(9.299793e-004 -1 1 9.299793e-004 182.7627 636.0137)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">STREET 2 </text>
  </g>
  
    <text transform="matrix(-0.004 -1.1029 1 -0.0036 184.0039 592.9814)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="6.6993">40’-0” WIDE ROAD</text>
  <rect x="240.816" y="610.083" fill="#FFFFFF" width="0.881" height="3.484"/>
  <rect x="240.816" y="610.083" fill="#FFFFFF" width="0.881" height="3.484"/>
  <rect x="240.816" y="603.417" fill="#FFFFFF" width="0.881" height="3.48"/>
  <rect x="240.816" y="603.417" fill="#FFFFFF" width="0.881" height="3.48"/>
  <rect x="240.816" y="596.752" fill="#FFFFFF" width="0.881" height="3.476"/>
  <rect x="240.526" y="590.077" fill="#FFFFFF" width="0.869" height="3.485"/>
  <rect x="240.526" y="583.411" fill="#FFFFFF" width="0.869" height="3.485"/>
  <rect x="240.526" y="577.031" fill="#FFFFFF" width="0.869" height="3.492"/>
  <rect x="240.526" y="570.363" fill="#FFFFFF" width="0.869" height="3.492"/>
  <g>
    <rect x="237.629" y="590.658" fill="#6F5E2A" width="6.669" height="24.35"/>
    
      <text transform="matrix(9.299793e-004 -1 1 9.299793e-004 241.9307 610.5518)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="4.1608">STREET 3 </text>
  </g>
  
    <text transform="matrix(-0.004 -1.1029 1 -0.0036 243.1821 567.5215)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="6.6993">40’-0” WIDE ROAD</text>
  <text transform="matrix(1 0 0 1 276.4155 508.2676)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="23.1947">SECTOR - C</text>
  <text transform="matrix(1 0 0 1 276.4155 525.6641)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="14.4967">PLAY GROUND</text>
  <rect x="65.113" y="317.255" fill="#FFFFFF" width="0.874" height="161.496"/>
  <rect x="67.147" y="512.09" fill="#FFFFFF" width="0.871" height="221.513"/>
  
    <text transform="matrix(-0.004 -1.1029 1 -0.0036 434.5693 460.6191)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="6.6993">40’-0” WIDE ROAD</text>
  <g>
    
      <rect x="71.208" y="490.346" fill="#7FA280" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="93.052" height="2.61"/>
    <g>
      <g>
        <g>
          <g>
            <path fill="#8CB347" d="M166.886,486.86c-0.594-0.289-1.16-0.592-1.742-0.592c-0.589,0-1.158,0.287-1.453,0.879l-0.287,0.282
              c0,0,0,0-0.276,0c-0.871,0-1.166,0.868-1.166,1.453v0.278c-0.281,0-0.281,0.287-0.594,0.287
              c-0.271,0.585-0.577,0.876-0.577,1.454c0,0.585,0.287,1.152,0.869,1.45c0,0.285,0,0.285,0,0.586
              c0,1.155,1.155,1.747,2.316,1.747l0,0l0,0c0,0,0.276,0.275,0.276,0.587c0.592,0.283,0.592,0.582,1.164,0.582
              c0.589,0,1.161-0.582,1.161-0.582l0,0c0,0,0-0.287,0.282-0.587h-0.282l0,0h0.579h0.284h0.29c0.584,0,1.156-0.285,1.45-0.871
              c0.287-0.587,0.592-0.876,0.592-1.751c0-0.275,0-0.576-0.284-0.868c0.284-0.278,0.284-0.863,0.284-1.154
              c0-0.285,0-0.588-0.284-0.875c0-0.275,0.284-0.579,0.284-1.147c0-1.162-1.155-2.028-2.311-2.028
              C167.175,486.571,167.175,486.86,166.886,486.86z"/>
            <path fill="#8CB347" d="M163.691,495.269L163.691,495.269L163.691,495.269z"/>
          </g>
          <g>
            <path fill="#8CB347" d="M161.665,489.469L161.665,489.469c-0.292,0-0.292,0-0.584,0.289c-0.287,0.588-0.594,0.875-0.594,1.454
              c0,0.59,0.289,1.16,0.865,1.446c0,0.296,0,0.296,0,0.604c0,1.155,1.164,1.733,2.321,1.733l0,0l0,0
              c0,0.287,0.284,0.287,0.284,0.287c0.582,0.285,1.15,0.584,1.739,0.584c0.587,0,1.161-0.279,1.451-0.871l0,0
              c0-0.275,0.282-0.275,0.282-0.581l0,0l0,0l0,0l0,0c0,0,0,0,0.289,0c0.584,0,1.15-0.289,1.445-0.881
              c0.29-0.579,0.592-0.875,0.592-1.741c0-0.277,0-0.585-0.284-0.87c-0.284,0.87-1.158,1.736-2.032,1.736
              c-0.584,0.604-1.155,0.875-2.024,0.875c-1.45,0-2.613-1.148-2.613-2.613C162.244,490.922,161.373,490.633,161.665,489.469
              L161.665,489.469z"/>
            <path fill="#8CB347" d="M163.691,495.269L163.691,495.269L163.691,495.269z"/>
          </g>
        </g>
        <g>
          <g>
            <path fill="#8CB347" d="M150.938,486.86c-0.586-0.289-1.147-0.592-1.739-0.592c-0.581,0.287-1.161,0.287-1.45,0.879
              l-0.282,0.282c0,0,0,0-0.289,0c-0.874,0-1.15,0.868-1.15,1.453v0.278c-0.29,0-0.29,0.287-0.592,0.287
              c-0.29,0.585-0.589,0.876-0.589,1.454c0,0.585,0.281,1.152,0.876,1.45c0,0.285,0,0.285,0,0.586
              c0,1.155,1.158,1.747,2.303,1.747l0,0l0,0c0,0,0.289,0.275,0.289,0.587c0.595,0.283,1.158,0.582,1.742,0.582
              c0.587,0,1.737-0.582,1.737-0.582l0,0c0,0,0-0.287,0.29-0.587h-0.29l0,0l0,0l0,0c0,0,0,0,0.29,0
              c0.592,0,1.155-0.285,1.45-0.871c0.281-0.587,0.581-0.876,0.581-1.751c0-0.275,0-0.576-0.281-0.868
              c0.281-0.278,0.281-0.863,0.281-1.154c0-0.285,0-0.588-0.281-0.875c0-0.275,0.281-0.579,0.281-1.147
              c0-1.162-1.158-2.028-2.305-2.028C151.517,486.571,150.938,486.86,150.938,486.86z"/>
            <path fill="#8CB347" d="M148.327,495.269L148.327,495.269L148.327,495.269z"/>
          </g>
          <g>
            <path fill="#8CB347" d="M146.59,489.469C146.009,489.469,146.009,489.469,146.59,489.469c-0.286,0-0.286,0-0.594,0.289
              c-0.276,0.588-0.579,0.875-0.579,1.454c0,0.59,0.287,1.16,0.866,1.446c0,0.296,0,0.296,0,0.604
              c0,1.155,1.158,1.733,2.318,1.733l0,0l0,0c0,0.287,0.279,0.287,0.279,0.287c0.591,0.285,1.161,0.584,1.737,0.584
              c0.595,0,1.163-0.279,1.458-0.871l0,0c0-0.275,0.289-0.275,0.289-0.581l0,0l0,0l0,0l0,0c0,0,0,0,0.271,0
              c0.597,0,1.166-0.289,1.458-0.881c0.282-0.579,0.587-0.875,0.587-1.741c0-0.277,0-0.585-0.279-0.87
              c-0.287,0.87-1.163,1.736-2.029,1.736c-0.595,0.604-1.161,0.875-2.035,0.875c-1.453,0-2.613-1.148-2.613-2.613
              C146.59,491.212,145.722,490.633,146.59,489.469C146.009,489.469,146.009,489.469,146.59,489.469z"/>
            <path fill="#8CB347" d="M148.327,495.269L148.327,495.269L148.327,495.269z"/>
          </g>
        </g>
        <g>
          <g>
            <path fill="#8CB347" d="M134.987,486.571c-0.58-0.284-1.161-0.576-1.739-0.576c-0.595,0.276-1.153,0.276-1.456,0.865
              l-0.276,0.287c0,0,0,0-0.292,0c-0.866,0-1.15,0.875-1.15,1.451v0.278c-0.281,0-0.281,0.284-0.589,0.284
              c-0.284,0.579-0.591,0.874-0.591,1.454c0,0.588,0.284,1.161,0.868,1.448c0,0.285,0,0.285,0,0.59
              c0,1.157,1.161,1.74,2.313,1.74l0,0l0,0c0,0,0.292,0.28,0.292,0.586c0.587,0.287,1.735,0.59,2.306,0.59
              c0.589,0,2.315-0.59,2.315-0.59l0,0c0,0,0-0.276,0.276-0.586h-0.276l0,0h-0.594h-0.279l0,0c0.586,0,1.153-0.284,1.453-0.872
              c0.29-0.589,0.595-0.868,0.595-1.736c0-0.286,0-0.6-0.287-0.871c0.287-0.29,0.287-0.876,0.287-1.163
              c0-0.282,0-0.587-0.287-0.865c0-0.285,0.287-0.596,0.287-1.162c0-1.154-1.163-2.024-2.311-2.024
              C135.863,486.282,135.282,486.571,134.987,486.571z"/>
            <path fill="#8CB347" d="M132.382,494.979L132.382,494.979L132.382,494.979z"/>
          </g>
          <g>
            <path fill="#8CB347" d="M130.645,489.469C130.645,489.469,130.353,489.469,130.645,489.469c-0.292,0-0.292,0-0.594,0.289
              c-0.29,0.588-0.587,0.875-0.587,1.454c0,0.59,0.279,1.16,0.872,1.446c0,0.296,0,0.296,0,0.604
              c0,1.155,1.161,1.733,2.308,1.733l0,0l0,0c0,0.287,0.281,0.287,0.281,0.287c0.59,0.285,1.161,0.584,1.745,0.584
              c0.592,0,1.156-0.279,1.45-0.871l0,0c0-0.275,0.282-0.275,0.282-0.581l0,0l0,0l0,0l0,0c0,0,0,0,0.287,0
              c0.587,0,1.161-0.289,1.45-0.881c0.287-0.579,0.587-0.875,0.587-1.741c0-0.277,0-0.585-0.284-0.87
              c-0.279,0.87-1.156,1.736-2.032,1.736c-0.582,0.604-1.15,0.875-2.019,0.875c-1.455,0-2.624-1.148-2.624-2.613
              C130.932,491.212,130.645,490.633,130.645,489.469L130.645,489.469z"/>
            <path fill="#8CB347" d="M132.382,494.979L132.382,494.979L132.382,494.979z"/>
          </g>
        </g>
        <g>
          <g>
            <path fill="#8CB347" d="M119.623,486.571c-0.582-0.284-1.161-0.576-1.742-0.576c-0.594,0.276-1.155,0.276-1.453,0.865
              l-0.276,0.287c0,0,0,0-0.284,0c-0.874,0-1.164,0.875-1.164,1.451v0.278c-0.278,0-0.278,0.284-0.583,0.284
              c-0.282,0.579-0.59,0.874-0.59,1.454c0,0.588,0.287,1.161,0.866,1.448c0,0.285,0,0.285,0,0.59c0,1.157,1.163,1.74,2.318,1.74
              l0,0l0,0c0,0,0.287,0.28,0.287,0.586c0.579,0.287,0.868,0.59,1.45,0.59c0.592,0,1.153-0.59,1.153-0.59l0,0
              c0,0,0-0.276,0.292-0.586h-0.292l0,0h0.292h0.279h0.287c0.584,0,1.161-0.284,1.453-0.872c0.292-0.589,0.587-0.868,0.587-1.736
              c0-0.286,0-0.6-0.284-0.871c0.284-0.29,0.284-0.876,0.284-1.163c0-0.282,0-0.587-0.284-0.865c0-0.285,0.284-0.596,0.284-1.162
              c0-1.154-1.152-2.024-2.313-2.024C120.494,486.571,119.623,486.571,119.623,486.571z"/>
            <path fill="#8CB347" d="M116.436,495.269L116.436,495.269L116.436,495.269z"/>
          </g>
          <g>
            <path fill="#8CB347" d="M114.694,489.469L114.694,489.469c-0.276,0-0.276,0-0.581,0.289c-0.282,0.588-0.589,0.875-0.589,1.454
              c0,0.59,0.284,1.16,0.865,1.446c0,0.296,0,0.296,0,0.604c0,1.155,1.163,1.733,2.319,1.733l0,0l0,0
              c0,0.287,0.287,0.287,0.287,0.287c0.579,0.285,1.148,0.584,1.739,0.584c0.584,0,1.159-0.279,1.448-0.871l0,0
              c0-0.275,0.287-0.275,0.287-0.581l0,0l0,0l0,0l0,0c0,0,0,0,0.287,0c0.587,0,1.147-0.289,1.451-0.881
              c0.281-0.579,0.594-0.875,0.594-1.741c0-0.277,0-0.585-0.292-0.87c-0.282,0.87-1.153,1.736-2.024,1.736
              c-0.586,0.604-1.163,0.875-2.031,0.875c-1.448,0-2.613-1.148-2.613-2.613C115.857,490.922,114.988,490.633,114.694,489.469
              L114.694,489.469z"/>
            <path fill="#8CB347" d="M116.436,495.269L116.436,495.269L116.436,495.269z"/>
          </g>
        </g>
        <g>
          <g>
            <path fill="#8CB347" d="M104.549,486.86c-0.592-0.289-1.155-0.592-1.735-0.592c-0.597,0.287-1.166,0.287-1.455,0.879
              l-0.295,0.282c0,0,0,0-0.276,0c-0.866,0-1.163,0.868-1.163,1.453v0.278c-0.279,0-0.279,0.287-0.579,0.287
              c-0.29,0.585-0.587,0.876-0.587,1.454c0,0.585,0.279,1.152,0.866,1.45c0,0.285,0,0.285,0,0.586
              c0,1.155,1.153,1.747,2.313,1.747l0,0l0,0c0,0,0.279,0.275,0.279,0.587c0.591,0.283,1.45,0.582,2.029,0.582
              c0.587,0,1.75-0.582,1.75-0.582l0,0c0,0,0-0.287,0.277-0.587h-0.277l0,0l0,0l0,0l0,0c0.582,0,1.148-0.285,1.453-0.871
              c0.279-0.587,0.579-0.876,0.579-1.751c0-0.275,0-0.576-0.282-0.868c0.282-0.278,0.282-0.863,0.282-1.154
              c0-0.285,0-0.588-0.282-0.875c0-0.275,0.282-0.579,0.282-1.147c0-1.162-1.15-2.028-2.311-2.028
              C104.549,486.571,104.838,486.86,104.549,486.86z"/>
            <path fill="#8CB347" d="M101.359,495.269L101.359,495.269L101.359,495.269z"/>
          </g>
          <g>
            <path fill="#8CB347" d="M99.038,489.469L99.038,489.469c-0.29,0-0.29,0-0.592,0.289c-0.29,0.588-0.584,0.875-0.584,1.454
              c0,0.59,0.279,1.16,0.869,1.446c0,0.296,0,0.296,0,0.604c0,1.155,1.16,1.733,2.306,1.733l0,0l0,0
              c0,0.287,0.292,0.287,0.292,0.287c0.583,0.285,1.153,0.584,1.734,0.584c0.595-0.279,1.163-0.279,1.455-0.871l0,0
              c0-0.275,0.282-0.275,0.282-0.581l0,0l0,0l0,0l0,0c0,0,0,0,0.284,0c0.589,0,1.161-0.289,1.45-0.881
              c0.282-0.579,0.589-0.875,0.589-1.741c0-0.277,0-0.585-0.289-0.87c-0.279,0.87-1.153,1.736-2.026,1.736
              c-0.584,0.604-1.153,0.875-2.021,0.875c-1.453,0-2.622-1.148-2.622-2.613C99.912,491.509,99.33,490.633,99.038,489.469
              L99.038,489.469z"/>
            <path fill="#8CB347" d="M101.359,495.269L101.359,495.269L101.359,495.269z"/>
          </g>
        </g>
        <g>
          <g>
            <path fill="#8CB347" d="M88.89,486.571c-0.581-0.284-1.16-0.576-1.737-0.576c-0.586,0-1.161,0.276-1.45,0.865l-0.287,0.287
              c0,0,0,0-0.287,0c-0.869,0-1.161,0.875-1.161,1.451v0.278c-0.279,0-0.279,0.284-0.587,0.284
              c-0.282,0.579-0.577,0.874-0.577,1.454c0,0.588,0.274,1.161,0.866,1.448c0,0.285,0,0.285,0,0.59c0,1.157,1.15,1.74,2.303,1.74
              l0,0l0,0c0,0,0.29,0.28,0.29,0.586c0.584,0.287,0.584,0.59,1.161,0.59c0.584,0,0.871-0.59,0.871-0.59l0,0
              c0,0,0-0.276,0.279-0.586h-0.279l0,0h0.869h0.279h0.29c0.582,0,1.158-0.284,1.456-0.872c0.276-0.589,0.574-0.868,0.574-1.736
              c0-0.286,0-0.6-0.282-0.871c0.282-0.29,0.282-0.876,0.282-1.163c0-0.282,0-0.587-0.282-0.865c0-0.285,0.282-0.596,0.282-1.162
              c0-1.154-1.15-2.024-2.311-2.024C89.182,486.282,88.89,486.571,88.89,486.571z"/>
            <path fill="#8CB347" d="M85.992,494.979L85.992,494.979L85.992,494.979z"/>
          </g>
          <g>
            <path fill="#8CB347" d="M83.966,489.469L83.966,489.469c-0.279,0-0.279,0-0.586,0.289c-0.282,0.588-0.582,0.875-0.582,1.454
              c0,0.59,0.277,1.16,0.872,1.446c0,0.296,0,0.296,0,0.604c0,1.155,1.15,1.733,2.303,1.733l0,0l0,0
              c0,0.287,0.29,0.287,0.29,0.287c0.584,0.285,1.158,0.584,1.742,0.584c0.586,0,1.155-0.279,1.453-0.871l0,0
              c0-0.275,0.279-0.275,0.279-0.581l0,0l0,0l0,0l0,0c0,0,0,0,0.281,0c0.587,0,1.164-0.289,1.45-0.881
              c0.287-0.579,0.595-0.875,0.595-1.741c0-0.277,0-0.585-0.287-0.87c-0.287,0.87-1.158,1.736-2.026,1.736
              c-0.587,0.604-1.161,0.875-2.032,0.875c-1.45,0-2.611-1.148-2.611-2.613C84.253,491.212,83.671,490.633,83.966,489.469
              L83.966,489.469z"/>
            <path fill="#8CB347" d="M85.992,494.979L85.992,494.979L85.992,494.979z"/>
          </g>
        </g>
        <g>
          <g>
            <path fill="#8CB347" d="M72.655,486.571c-0.584-0.284-1.164-0.576-1.742-0.576c-0.587,0-1.156,0.276-1.458,0.865l-0.277,0.287
              c0,0,0,0-0.287,0c-0.868,0-1.158,0.875-1.158,1.451v0.278c-0.278,0-0.278,0.284-0.586,0.284
              c-0.282,0.579-0.587,0.874-0.587,1.454c0,0.588,0.285,1.161,0.872,1.448c0,0.285,0,0.285,0,0.59
              c0,1.157,1.155,1.74,2.316,1.74l0,0l0,0c0,0,0.282,0.28,0.282,0.586c0.584,0.287,0.871,0.59,1.74,0.59
              c0.582,0,1.447-0.59,1.447-0.59l0,0c0,0,0-0.276,0.29-0.586h-0.29l0,0h0.29l0,0h0.284c0.587,0,1.158-0.284,1.45-0.872
              c0.292-0.589,0.592-0.868,0.592-1.736c0-0.286,0-0.6-0.282-0.871c0.282-0.29,0.282-0.876,0.282-1.163
              c0-0.282,0-0.587-0.282-0.865c0-0.285,0.282-0.596,0.282-1.162c0-1.154-1.153-2.024-2.313-2.024
              C73.239,486.282,72.944,486.571,72.655,486.571z"/>
            <path fill="#8CB347" d="M70.044,494.979L70.044,494.979L70.044,494.979z"/>
          </g>
          <g>
            <path fill="#8CB347" d="M68.308,489.469C68.308,489.469,68.01,489.469,68.308,489.469c-0.29,0-0.29,0-0.595,0.289
              c-0.279,0.588-0.587,0.875-0.587,1.454c0,0.59,0.281,1.16,0.871,1.446c0,0.296,0,0.296,0,0.604
              c0,1.155,1.158,1.733,2.306,1.733l0,0l0,0c0,0.287,0.292,0.287,0.292,0.287c0.592,0.285,1.15,0.584,1.734,0.584
              c0.594,0,1.163-0.279,1.455-0.871l0,0c0-0.275,0.287-0.275,0.287-0.581l0,0l0,0l0,0l0,0c0,0,0,0,0.279,0
              c0.587,0,1.163-0.289,1.453-0.881c0.281-0.579,0.586-0.875,0.586-1.741c0-0.277,0-0.585-0.287-0.87
              c-0.282,0.87-1.153,1.736-2.016,1.736c-0.597,0.604-1.166,0.875-2.034,0.875c-1.453,0-2.621-1.148-2.621-2.613
              C68.308,491.212,68.308,490.633,68.308,489.469L68.308,489.469z"/>
            <path fill="#8CB347" d="M70.044,494.979L70.044,494.979L70.044,494.979z"/>
          </g>
        </g>
      </g>
      <g>
        <rect x="66.857" y="481.64" fill="#FFFFFF" width="4.056" height="0.874"/>
        <rect x="72.079" y="481.64" fill="#FFFFFF" width="4.056" height="0.874"/>
        <rect x="77.871" y="481.358" fill="#FFFFFF" width="4.053" height="0.866"/>
        <rect x="83.095" y="481.358" fill="#FFFFFF" width="4.061" height="0.866"/>
        <rect x="88.89" y="481.935" fill="#FFFFFF" width="4.059" height="0.873"/>
        <rect x="94.688" y="481.64" fill="#FFFFFF" width="4.058" height="0.874"/>
        <rect x="100.198" y="481.64" fill="#FFFFFF" width="4.063" height="0.874"/>
        <rect x="105.996" y="481.64" fill="#FFFFFF" width="4.063" height="0.874"/>
        <rect x="111.794" y="481.64" fill="#FFFFFF" width="4.063" height="0.874"/>
        <rect x="117.594" y="481.358" fill="#FFFFFF" width="4.059" height="0.866"/>
        <rect x="123.392" y="481.64" fill="#FFFFFF" width="4.058" height="0.874"/>
        <rect x="129.192" y="481.64" fill="#FFFFFF" width="4.056" height="0.874"/>
        <rect x="134.987" y="481.935" fill="#FFFFFF" width="4.061" height="0.873"/>
        <rect x="139.922" y="481.64" fill="#FFFFFF" width="4.061" height="0.874"/>
        <rect x="145.722" y="481.64" fill="#FFFFFF" width="4.058" height="0.874"/>
        <rect x="151.222" y="481.64" fill="#FFFFFF" width="4.062" height="0.874"/>
        <rect x="157.028" y="481.64" fill="#FFFFFF" width="4.061" height="0.874"/>
        <rect x="162.823" y="481.64" fill="#FFFFFF" width="4.063" height="0.874"/>
      </g>
      <g>
        <rect x="67.147" y="500.491" fill="#FFFFFF" width="4.063" height="0.881"/>
        <rect x="72.655" y="500.78" fill="#FFFFFF" width="4.052" height="0.869"/>
        <rect x="78.456" y="500.78" fill="#FFFFFF" width="4.055" height="0.869"/>
        <rect x="83.966" y="500.491" fill="#FFFFFF" width="4.059" height="0.881"/>
        <rect x="89.472" y="500.78" fill="#FFFFFF" width="4.048" height="0.869"/>
        <rect x="95.267" y="500.78" fill="#FFFFFF" width="4.061" height="0.869"/>
        <rect x="100.491" y="500.78" fill="#FFFFFF" width="4.053" height="0.869"/>
        <rect x="106.578" y="500.78" fill="#FFFFFF" width="4.05" height="0.869"/>
        <rect x="112.375" y="500.78" fill="#FFFFFF" width="4.05" height="0.869"/>
        <rect x="117.886" y="500.78" fill="#FFFFFF" width="4.058" height="0.869"/>
        <rect x="123.687" y="500.491" fill="#FFFFFF" width="4.058" height="0.881"/>
        <rect x="129.481" y="500.491" fill="#FFFFFF" width="4.061" height="0.881"/>
        <rect x="135.282" y="500.78" fill="#FFFFFF" width="4.047" height="0.869"/>
        <rect x="140.795" y="501.069" fill="#FFFFFF" width="4.05" height="0.872"/>
        <rect x="146.59" y="500.78" fill="#FFFFFF" width="4.059" height="0.869"/>
        <rect x="152.096" y="500.78" fill="#FFFFFF" width="4.055" height="0.869"/>
        <rect x="157.314" y="500.78" fill="#FFFFFF" width="4.045" height="0.869"/>
        <rect x="163.118" y="500.491" fill="#FFFFFF" width="4.044" height="0.881"/>
      </g>
    </g>
  </g>
  <g>
    <g>
      <path fill="#8CB347" d="M220.229,484.259c0.878-1.161,1.163-2.311,1.163-3.487c0-1.171-0.594-2.615-1.734-3.482
        c-0.295-0.285-0.295-0.285-0.595-0.598v-0.275c0-1.745-1.748-2.897-3.189-2.897c-0.279,0-0.279,0-0.582,0
        c-0.29-0.281-0.584-0.874-0.874-1.167c-0.869-0.856-2.026-1.148-3.489-1.148c-1.45,0-2.611,0.871-3.482,2.03
        c-0.287,0-0.871,0-1.447,0c-2.319,0-4.36,2.309-4.653,4.351h-0.582l0,0c0,0.287-0.289,0.577-0.582,0.871
        c-0.881,0.869-1.163,2.314-1.163,3.767c0,1.16,1.742,2.62,1.742,3.187l0,0c0,0.287,0.874,0.584,1.158,0.869v0.289l0,0l0,0l0,0
        v0.278c0,1.166,0.584,2.314,1.742,3.188c1.161,0.873,2.305,1.146,3.479,1.146c0.595,0,1.164-0.273,1.74-0.586
        c0.881,0.586,1.755,0.586,2.619,0.586c0.868,0,1.453-0.273,2.034-0.586c0.582,0.289,1.45,0.289,2.305,0.289
        c2.611,0,4.361-2.616,4.059-4.929C220.523,485.412,220.523,484.835,220.229,484.259z"/>
      <path fill="#8CB347" d="M201.677,477.587L201.677,477.587L201.677,477.587z"/>
    </g>
    <g>
      <path fill="#8CB347" d="M214.723,473.526L214.723,473.526c0-0.601-0.287-0.874-0.595-1.165c-0.866-0.866-2.029-1.158-3.479-1.158
        c-1.46,0-2.613,0.871-3.495,2.03c-0.276,0-0.865,0-1.453,0c-2.318,0-4.053,2.316-4.053,4.359c0,0,0,0-0.281,0l0,0
        c-0.287,0.278-0.595,0.586-0.879,0.862c-0.866,0.877-1.448,2.314-1.15,3.774c0,1.16,0.584,2.624,1.739,3.179l0,0
        c0.287,0.295,0.587,0.596,1.158,0.596l0,0l0,0l0,0l0,0v0.28c0,1.158,0.587,2.319,1.743,3.181
        c1.155,0.586,2.305,1.162,3.481,1.162c0.592,0,1.153,0,1.74-0.283c-2.024-0.588-3.487-2.314-4.051-4.352
        c-1.161-1.162-1.75-2.618-1.75-4.063c0-3.184,2.624-5.794,5.801-5.794c1.163-1.45,2.897-2.614,4.926-2.903
        C214.433,473.526,214.723,473.526,214.723,473.526z"/>
      <path fill="#8CB347" d="M201.677,477.587L201.677,477.587L201.677,477.587z"/>
    </g>
  </g>
  <g>
    <g>
      <g>
        <path fill="#8CB347" d="M448.984,475.561c0.868-1.161,1.163-2.312,1.163-3.484c0-1.164-0.592-2.612-1.753-3.487
          c-0.275-0.284-0.275-0.284-0.578-0.593v-0.277c0-1.735-1.745-2.897-3.189-2.897c-0.276,0-0.276,0-0.584,0
          c-0.285-0.283-0.59-0.875-0.871-1.155c-0.864-0.873-2.03-1.162-3.49-1.162c-1.45,0-2.608,0.875-3.479,2.032
          c-0.29,0-0.871,0-1.458,0c-2.309,0-4.355,2.308-4.64,4.351h-0.585l0,0c0,0.29-0.287,0.589-0.589,0.863
          c-0.869,0.876-1.152,2.324-1.152,3.772c0,1.164,1.739,2.62,1.739,3.185l0,0c0,0.29,0.868,0.588,1.157,0.875v0.287l0,0l0,0l0,0
          v0.278c0,1.166,0.588,2.314,1.742,3.196c1.159,0.865,2.304,1.141,3.48,1.141c0.594,0,1.159-0.275,1.741-0.58
          c0.877,0.58,1.747,0.58,2.616,0.58c0.873,0,1.45-0.275,2.034-0.58c0.584,0.281,1.444,0.281,2.306,0.281
          c2.616,0,4.359-2.616,4.061-4.93C449.569,476.713,449.569,476.141,448.984,475.561z"/>
        <path fill="#8CB347" d="M431.013,468.89L431.013,468.89L431.013,468.89z"/>
      </g>
      <g>
        <path fill="#8CB347" d="M444.061,464.828L444.061,464.828c0-0.598-0.284-0.873-0.584-1.162
          c-0.879-0.863-2.026-1.162-3.484-1.162c-1.453,0-2.618,0.875-3.487,2.032c-0.287,0-0.868,0-1.458,0
          c-2.303,0-4.045,2.316-4.045,4.357c0,0,0,0-0.289,0l0,0c-0.287,0.283-0.588,0.593-0.865,0.863
          c-0.872,0.877-1.454,2.317-1.159,3.775c0,1.162,0.579,2.617,1.735,3.185l0,0c0.286,0.289,0.595,0.578,1.163,0.578l0,0l0,0l0,0
          l0,0v0.294c0,1.156,0.589,2.317,1.736,3.178c1.163,0.873,2.318,1.162,3.492,1.162c0.581,0,1.15,0,1.742-0.286
          c-2.029-0.586-3.492-2.311-4.061-4.358c-1.157-1.149-1.739-2.6-1.739-4.053c0-3.188,2.612-5.798,5.8-5.798
          c1.158-1.446,2.897-2.61,4.924-2.899C443.477,464.828,444.061,464.828,444.061,464.828z"/>
        <path fill="#8CB347" d="M431.013,468.89L431.013,468.89L431.013,468.89z"/>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M386.363,475.561c0.87-1.161,1.157-2.312,1.157-3.484c0-1.164-0.578-2.612-1.739-3.487
          c-0.287-0.284-0.287-0.284-0.598-0.593v-0.277c0-1.735-1.733-2.897-3.174-2.897c-0.284,0-0.284,0-0.592,0
          c-0.276-0.283-0.578-0.875-0.865-1.155c-0.869-0.873-2.032-1.162-3.488-1.162c-1.457,0-2.612,0.875-3.48,2.032
          c-0.29,0-0.879,0-1.453,0c-2.308,0-4.927,2.606-4.927,4.641h-1.158l0,0c0,0.284,0.29,0.573,0,0.86
          c-0.873,0.873-1.45,2.32-1.45,3.772c0,1.164,1.45,2.325,1.45,2.897l0,0c0,0.29,1.456,0.588,1.751,0.875l0.584,0.287l0,0l0,0l0,0
          v0.278c0,1.166,0.589,2.314,1.739,3.196c1.158,0.865,2.318,1.141,3.49,1.141c0.586,0,1.152-0.275,1.741-0.58
          c0.871,0.58,1.742,0.58,2.61,0.58c0.872,0,1.458-0.275,2.032-0.58c0.584,0.281,1.455,0.281,2.315,0.281
          c2.61,0,4.352-2.616,4.048-4.93C386.655,476.713,386.363,476.141,386.363,475.561z"/>
        <path fill="#8CB347" d="M368.099,468.592L368.099,468.592L368.099,468.592z"/>
      </g>
      <g>
        <path fill="#8CB347" d="M381.145,464.828L381.145,464.828c0-0.598-0.287-0.873-0.592-1.162
          c-0.872-0.863-2.032-1.162-3.488-1.162c-1.454,0-2.61,0.875-3.479,2.032c-0.284,0-0.877,0-1.453,0
          c-2.308,0-4.063,2.316-4.063,4.357c0,0,0,0-0.273,0l0,0c-0.287,0.283-0.593,0.593-0.869,0.863
          c-0.874,0.877-1.456,2.317-1.163,3.775c0,1.162,0.587,2.617,1.743,3.185l0,0c0.285,0.289,0.58,0.578,1.157,0.578l0,0l0,0l0,0
          l0,0v0.294c0,1.156,0.584,2.317,1.742,3.178c1.157,0.873,2.306,1.162,3.484,1.162c0.586,0,1.152,0,1.739-0.286
          c-2.024-0.586-3.484-2.311-4.053-4.358c-1.155-1.149-1.739-2.6-1.739-4.053c0-3.188,2.615-5.798,5.792-5.798
          c1.158-1.446,2.897-2.61,4.93-2.899C380.85,464.828,380.85,464.828,381.145,464.828z"/>
        <path fill="#8CB347" d="M368.099,468.592L368.099,468.592L368.099,468.592z"/>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M323.736,475.561c0.874-1.161,1.155-2.312,1.155-3.484c0-1.164-0.59-2.612-1.745-3.487
          c-0.279-0.284-0.279-0.284-0.582-0.593v-0.277c0-1.735-1.739-2.897-3.184-2.897c-0.279,0-0.279,0-0.584,0
          c-0.289-0.283-0.595-0.875-0.869-1.155c-0.87-0.873-2.031-1.162-3.494-1.162c-1.45,0-2.613,0.875-3.484,2.032
          c-0.287,0-0.869,0-1.456,0c-2.313,0-4.055,2.308-4.055,4.351l0,0l0,0c0,0.29-0.869,0.589-1.156,0.863
          c-0.879,0.876-1.161,2.324-0.879,3.772c0,1.164,2.035,2.62,2.035,3.185l0,0c0,0.29,0.278,0.588,0.587,0.875l-0.29,0.287l0,0l0,0
          l0,0v0.278c0,1.166,0.589,2.314,1.748,3.196c1.152,0.865,2.308,1.141,3.486,1.141c0.592,0,1.158-0.275,1.737-0.58
          c0.873,0.58,1.742,0.58,2.618,0.58c0.871,0,1.455-0.275,2.023-0.58c0.593,0.281,1.452,0.281,2.316,0.281
          c2.613,0,4.351-2.616,4.058-4.93C324.315,476.713,323.736,476.141,323.736,475.561z"/>
        <path fill="#8CB347" d="M305.182,468.89L305.182,468.89L305.182,468.89z"/>
      </g>
      <g>
        <path fill="#8CB347" d="M318.225,464.538C318.225,464.538,318.81,464.538,318.225,464.538c0-0.583-0.273-0.87-0.578-1.157
          c-0.866-0.873-2.032-1.157-3.484-1.157c-1.458,0-2.613,0.873-3.49,2.023c-0.278,0-0.873,0-1.447,0
          c-2.315,0-4.055,2.316-4.055,4.366c0,0,0,0-0.29,0l0,0c-0.279,0.28-0.584,0.586-0.871,0.873
          c-0.866,0.871-1.448,2.308-1.145,3.769c0,1.145,0.579,2.605,1.737,3.177l0,0c0.29,0.285,0.584,0.59,1.163,0.59l0,0l0,0l0,0l0,0
          v0.276c0,1.16,0.576,2.318,1.735,3.198c1.165,0.859,2.306,1.148,3.484,1.148c0.594,0,1.16,0,1.736-0.286
          c-2.026-0.587-3.476-2.306-4.042-4.348c-1.166-1.16-1.755-2.615-1.755-4.061c0-3.188,2.623-5.796,5.797-5.796
          c1.165-1.452,2.9-2.616,4.933-2.905C317.941,464.828,318.225,464.538,318.225,464.538z"/>
        <path fill="#8CB347" d="M305.182,468.89L305.182,468.89L305.182,468.89z"/>
      </g>
    </g>
    <g>
      <g>
        <path fill="#8CB347" d="M261.109,475.561c0.876-1.161,1.163-2.312,1.163-3.484c0-1.164-0.584-2.612-1.739-3.487
          c-0.29-0.284-0.29-0.284-0.592-0.593v-0.277c0-1.735-1.743-2.897-3.182-2.897c-0.282,0-0.282,0-0.589,0
          c-0.279-0.283-0.582-0.875-0.872-1.155c-0.868-0.873-2.032-1.162-3.484-1.162c-1.458,0-2.611,0.875-3.492,2.032
          c-0.277,0-0.869,0-1.448,0c-2.315,0-4.36,2.308-4.635,4.351h-0.597l0,0c0,0.29-0.271,0.589-0.582,0.863
          c-0.868,0.876-1.155,2.324-1.155,3.772c0,1.164,1.733,2.62,1.733,3.185l0,0c0,0.29,0.872,0.588,1.167,0.875v0.287l0,0l0,0l0,0
          v0.278c0,1.166,0.594,2.314,1.735,3.196c1.165,0.865,2.318,1.141,3.497,1.141c0.584,0,1.158-0.275,1.74-0.58
          c0.866,0.58,1.739,0.58,2.61,0.58c0.871,0,1.453-0.275,2.031-0.58c0.592,0.281,1.453,0.281,2.313,0.281
          c2.611,0,4.355-2.616,4.051-4.93C261.109,476.713,261.109,476.141,261.109,475.561z"/>
        <path fill="#8CB347" d="M242.555,468.89L242.555,468.89L242.555,468.89z"/>
      </g>
      <g>
        <path fill="#8CB347" d="M255.609,464.828L255.609,464.828c0-0.598-0.293-0.873-0.584-1.162
          c-0.881-0.863-2.032-1.162-3.498-1.162c-1.444,0-2.613,0.875-3.484,2.032c-0.279,0-0.866,0-1.45,0
          c-2.306,0-4.053,2.316-4.053,4.357c0,0,0,0-0.285,0l0,0c-0.284,0.283-0.592,0.593-0.872,0.863
          c-0.868,0.877-1.452,2.317-1.157,3.775c0,1.162,0.581,2.617,1.742,3.185l0,0c0.285,0.289,0.59,0.578,1.156,0.578l0,0l0,0l0,0
          l0,0v0.294c0,1.156,0.583,2.317,1.741,3.178c1.155,0.873,2.316,1.162,3.496,1.162c0.576,0,1.145,0,1.733-0.286
          c-2.032-0.586-3.49-2.311-4.061-4.358c-1.152-1.149-1.734-2.6-1.734-4.053c0-3.188,2.616-5.798,5.795-5.798
          c1.163-1.446,2.903-2.61,4.934-2.899C255.314,464.828,255.609,464.828,255.609,464.828z"/>
        <path fill="#8CB347" d="M242.555,468.89L242.555,468.89L242.555,468.89z"/>
      </g>
    </g>
  </g>
  <g>
    <g>
      <path fill="#8CB347" d="M255.609,505.13c-1.164-0.881-2.317-1.166-3.488-1.166c-1.168,0-2.621,0.59-3.492,1.742
        c-0.275,0.287-0.275,0.287-0.586,0.586h-0.279c-1.747,0-2.899,1.749-2.899,3.184c0,0.283,0,0.283,0,0.584
        c-0.279,0.287-0.874,0.593-1.163,0.882c-0.872,0.868-1.153,2.019-1.153,3.479c0,1.451,0.874,2.616,2.031,3.485
        c0,0.283,0,0.868,0,1.455c0,2.306,2.306,4.634,4.354,4.634v0.588l0,0c0.287,0,0.586,0.291,0.875,0.594
        c0.869,0.866,2.313,1.16,3.764,1.16c1.161,0,2.616-1.752,3.182-1.752l0,0c0.29,0,1.452-0.868,1.452-1.152
        c0,0,0.874,0,0.874-0.285l0,0h-0.874h-0.275c0,0,0,0,0.275,0c1.159,0,2.319-0.581,3.187-1.739
        c0.866-1.16,1.156-2.315,1.156-3.492c0-0.586-0.287-1.15-0.587-1.739c0.587-0.875,0.587-1.742,0.587-2.612
        c0-0.869-0.287-1.454-0.587-2.03c0.285-0.582,0.285-1.451,0.285-2.311c0-2.619-2.613-4.358-4.93-4.059
        C256.759,504.549,255.893,504.549,255.609,505.13z"/>
      <path fill="#8CB347" d="M248.351,523.392L248.351,523.392L248.351,523.392z"/>
    </g>
    <g>
      <path fill="#8CB347" d="M244.59,510.347L244.59,510.347c-0.582,0-0.877,0.287-1.156,0.581c-0.864,0.879-1.157,2.029-1.157,3.49
        c0,1.45,0.868,2.616,2.028,3.487c0,0.281,0,0.868,0,1.455c0,2.303,2.308,4.053,4.354,4.053c0,0,0,0,0,0.281l0,0
        c0.283,0.284,0.594,0.595,0.868,0.869c0.869,0.868,2.319,1.455,3.771,1.16c1.161,0,2.621-0.584,3.187-1.743l0,0
        c0.282-0.283,0.592-0.591,0.592-1.155l0,0l0,0l0,0l0,0h0.277c1.161,0,2.313-0.58,3.187-1.744
        c0.868-1.153,1.157-2.313,1.157-3.479c0-0.597,0-1.161-0.287-1.753c-0.591,2.031-2.312,3.495-4.36,4.063
        c-1.153,1.152-2.613,1.736-4.05,1.736c-3.179,0-5.798-2.614-5.798-5.802c-1.458-1.15-2.616-2.897-2.899-4.919
        C244.59,510.639,244.59,510.639,244.59,510.347z"/>
      <path fill="#8CB347" d="M248.351,523.392L248.351,523.392L248.351,523.392z"/>
    </g>
  </g>
  <g>
    <g>
      <path fill="#8CB347" d="M255.609,546.59c-1.164-0.868-2.317-1.162-3.488-1.162c-1.168,0-2.621,0.595-3.492,1.757
        c-0.275,0.274-0.275,0.274-0.586,0.571h-0.279c-1.747,0-2.899,1.75-2.899,3.189c0,0.28,0,0.28,0,0.59
        c-0.279,0.285-0.874,0.59-1.163,0.868c-0.872,0.865-1.153,2.029-1.153,3.495c0,1.445,0.874,2.605,2.031,3.477
        c0,0.287,0,0.871,0,1.456c0,2.305,2.306,5.211,4.354,5.211v1.449l0,0c0.287,0,0.586-0.586,0.875-0.283
        c0.869,0.87,2.606,1.738,3.764,1.448c1.161,0,2.616-1.152,3.182-1.152l0,0c0.29,0,1.452-1.747,1.452-2.026l0.874-0.871l0,0
        h-0.874h-0.275c0,0,0,0,0.275,0c1.159,0,2.319-0.589,3.187-1.75c0.866-1.147,1.156-2.305,1.156-3.481
        c0-0.579-0.287-1.155-0.587-1.739c0.587-0.868,0.587-1.734,0.587-2.616s-0.287-1.454-0.587-2.024
        c0.285-0.592,0.285-1.452,0.285-2.315c0-2.614-2.613-4.352-4.93-4.059C256.473,546.303,255.893,546.303,255.609,546.59z"/>
      <path fill="#8CB347" d="M248.351,565.145L248.351,565.145L248.351,565.145z"/>
    </g>
    <g>
      <path fill="#8CB347" d="M244.59,552.391C244.59,552.096,244.59,552.096,244.59,552.391c-0.582,0-0.877,0.284-1.156,0.593
        c-0.864,0.871-1.157,2.015-1.157,3.479c0,1.454,0.868,2.612,2.028,3.48c0,0.289,0,0.871,0,1.456c0,2.31,2.308,4.061,4.354,4.061
        c0,0,0,0,0,0.276l0,0c0.283,0.289,0.594,0.595,0.868,0.874c0.869,0.865,2.319,1.452,3.771,1.158c1.161,0,2.621-0.588,3.187-1.74
        l0,0c0.282-0.29,0.592-0.581,0.592-1.157l0,0l0,0l0,0l0,0h0.277c1.161,0,2.313-0.59,3.187-1.743
        c0.868-1.157,1.157-2.316,1.157-3.481c0-0.595,0-1.161-0.287-1.747c-0.591,2.023-2.312,3.488-4.36,4.052
        c-1.153,1.163-2.613,1.749-4.05,1.749c-3.179,0-5.798-2.614-5.798-5.801c-1.458-1.15-2.616-2.903-2.899-4.916
        C244.59,552.678,244.59,552.391,244.59,552.391z"/>
      <path fill="#8CB347" d="M248.351,565.145L248.351,565.145L248.351,565.145z"/>
    </g>
  </g>
  <g>
    <g>
      <path fill="#8CB347" d="M255.609,589.788c-1.164-0.868-2.317-1.162-3.488-1.162c-1.168,0-2.621,0.592-3.492,1.74
        c-0.275,0.287-0.275,0.287-0.586,0.595h-0.279c-1.747,0-2.899,1.74-2.899,3.187c0,0.276,0,0.276,0,0.579
        c-0.279,0.287-0.874,0.585-1.163,0.872c-0.872,0.87-1.153,2.032-1.153,3.483c0,1.455,0.874,2.622,2.031,3.489
        c0,0.285,0,0.868,0,1.454c0,2.312,2.306,4.053,4.354,4.053v0.291l0,0c0.287,0,0.586,0.586,0.875,0.863
        c0.869,0.873,2.313,1.167,3.764,0.873c1.161,0,2.616-1.736,3.182-1.736l0,0c0.29,0,1.452-0.595,1.452-0.868l0.874,0.276l0,0
        h-0.874h-0.275c0,0,0,0,0.275,0c1.159,0,2.319-0.586,3.187-1.733c0.866-1.167,1.156-2.315,1.156-3.49
        c0-0.592-0.287-1.159-0.587-1.74c0.587-0.873,0.587-1.747,0.587-2.617s-0.287-1.447-0.587-2.03
        c0.285-0.581,0.285-1.448,0.285-2.308c0-2.608-2.613-4.36-4.93-4.055C256.473,589.211,255.609,589.498,255.609,589.788z"/>
      <path fill="#8CB347" d="M248.351,608.347L248.351,608.347L248.351,608.347z"/>
    </g>
    <g>
      <path fill="#8CB347" d="M244.298,595.298C244.298,595.298,244.298,595.007,244.298,595.298c-0.595,0-0.871,0.285-1.163,0.588
        c-0.866,0.875-1.156,2.034-1.156,3.487c0,1.456,0.869,2.613,2.032,3.488c0,0.287,0,0.872,0,1.451
        c0,2.318,2.313,4.062,4.348,4.062c0,0,0,0,0,0.277l0,0c0.287,0.294,0.592,0.591,0.881,0.88c0.866,0.872,2.306,1.451,3.769,1.15
        c1.15,0,2.611-0.586,3.179-1.733l0,0c0.279-0.294,0.584-0.588,0.584-1.164l0,0l0,0l0,0l0,0h0.282
        c1.158,0,2.316-0.588,3.185-1.736c0.871-1.166,1.163-2.313,1.163-3.489c0-0.593,0-1.16-0.29-1.738
        c-0.582,2.021-2.308,3.48-4.355,4.05c-1.153,1.16-2.613,1.736-4.053,1.736c-3.189,0-5.795-2.61-5.795-5.786
        c-1.458-1.16-2.616-2.897-2.902-4.933C244.59,595.588,244.298,595.298,244.298,595.298z"/>
      <path fill="#8CB347" d="M248.351,608.347L248.351,608.347L248.351,608.347z"/>
    </g>
  </g>
  <path fill="#AA967F" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" d="M534.786,411.411
    c-0.517-2.463-19.197-62.745-19.197-62.745l-6.583,1.056l-5.219,23.634l-13.973,13.3l-11.822,4.846l-30.859-4.667l-7.694-3.673
    l0.427,43.625l92.814-1.393C532.668,425.396,535.29,413.87,534.786,411.411z"/>
  <path fill="#AA967F" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" d="M439.856,426.788l92.823-1.393
    c0,0-6.405,15.582-15.093,22.896l-24.821,19.147l-7.829,4.506l-45.219,0.423L439.856,426.788z"/>
  <text transform="matrix(1.007 0 0 1 458.8477 407.6875)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="10.2582">Desalination</text>
  <text transform="matrix(1.007 0 0 1 474.7832 420.002)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="10.2582">Plant</text>
  <text transform="matrix(1.007 0 0 1 457.0059 451.0176)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="12.3015">Mosque</text>
</g>
<g id="sector-C">
  
    <rect x="131.221" y="626.898" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.603"/>
  
    <rect x="131.221" y="638.501" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.597"/>
  <g id="sc-C_x7C_pl-1_x7C_st-_x7C_gz-1000">
    
      <rect x="71.208" y="230.562" fill="#EBDE9E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="42.037" height="46.392"/>
    <g>
      <text transform="matrix(1 0 0 1 89.5073 256.8745)" font-family="'MyriadPro-Regular'" font-size="10.6136">1</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-2_x7C_st-_x7C_gz-1000">
    <g>
      
        <rect x="113.246" y="230.562" fill="#EBDE9E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.755" height="46.392"/>
    </g>
    <g>
      <text transform="matrix(1 0 0 1 131.4009 256.8745)" font-family="'MyriadPro-Regular'" font-size="10.6136">2</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-3_x7C_st-_x7C_gz-1000">
    
      <rect x="173.844" y="230.562" fill="#EBDE9E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.46" height="46.392"/>
    <g>
      <text transform="matrix(1 0 0 1 191.853 256.8745)" font-family="'MyriadPro-Regular'" font-size="10.6136">3</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-4_x7C_st-_x7C_gz-1000">
    
      <rect x="215.305" y="230.562" fill="#EBDE9E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.449" height="46.392"/>
    <g>
      <text transform="matrix(1 0 0 1 233.3154 256.8745)" font-family="'MyriadPro-Regular'" font-size="10.6136">4</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-5_x7C_st-_x7C_gz-1000">
    
      <rect x="276.187" y="230.562" fill="#EBDE9E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.768" height="46.392"/>
    <g>
      <text transform="matrix(1 0 0 1 294.3462 256.8745)" font-family="'MyriadPro-Regular'" font-size="10.6136">5</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-6_x7C_st-_x7C_gz-1000">
    
      <rect x="317.941" y="230.562" fill="#EBDE9E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.752" height="46.392"/>
    <g>
      <text transform="matrix(1 0 0 1 336.0957 256.8745)" font-family="'MyriadPro-Regular'" font-size="10.6136">6</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-7_x7C_st-_x7C_gz-1000">
    
      <rect x="378.534" y="230.562" fill="#EBDE9E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.765" height="46.392"/>
    <g>
      <text transform="matrix(1 0 0 1 396.6914 256.8745)" font-family="'MyriadPro-Regular'" font-size="10.6136">7</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-8_x7C_st-_x7C_gz-1000">
    <polygon fill="#EBDE9E" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="471.604,230.562 486.971,276.948 
      420.283,276.948 420.283,230.562     "/>
    <g>
      <text transform="matrix(1 0 0 1 445.5137 256.8745)" font-family="'MyriadPro-Regular'" font-size="10.6136">8</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-1_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="131.8" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 139.8071 327.21)" font-family="'MyriadPro-Regular'" font-size="8.0541">1</text>
  </g>
  <g id="sc-C_x7C_pl-2_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="143.398" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.309" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 150.8101 327.2002)" font-family="'MyriadPro-Regular'" font-size="8.0541">2</text>
  </g>
  <g id="sc-C_x7C_pl-3_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="154.996" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 163.5918 327.1914)" font-family="'MyriadPro-Regular'" font-size="8.0541">3</text>
  </g>
  <g id="sc-C_x7C_pl-4_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="166.599" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.877" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 174.7598 327.1938)" font-family="'MyriadPro-Regular'" font-size="8.0541">4</text>
  </g>
  <g id="sc-C_x7C_pl-5_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="178.479" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.584" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 186.5698 327.2021)" font-family="'MyriadPro-Regular'" font-size="8.0541">5</text>
  </g>
  <g id="sc-C_x7C_pl-6_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="190.077" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 197.7319 327.2017)" font-family="'MyriadPro-Regular'" font-size="8.0541">6</text>
  </g>
  <g id="sc-C_x7C_pl-7_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="201.677" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 209.3843 327.2012)" font-family="'MyriadPro-Regular'" font-size="8.0541">7</text>
  </g>
  <g id="sc-C_x7C_pl-8_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="213.275" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 220.5488 327.2197)" font-family="'MyriadPro-Regular'" font-size="8.0541">8</text>
  </g>
  <g id="sc-C_x7C_pl-9_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="224.871" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 232.8379 327.2197)" font-family="'MyriadPro-Regular'" font-size="8.0541">9</text>
  </g>
  <g id="sc-C_x7C_pl-10_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="236.468" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.882" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 244.814 329.1987)" font-family="'MyriadPro-Regular'" font-size="8.0541">10</text>
  </g>
  <g id="sc-C_x7C_pl-11_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="248.061" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.88" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 256.3047 329.2124)" font-family="'MyriadPro-Regular'" font-size="8.0541">11</text>
  </g>
  <g id="sc-C_x7C_pl-12_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="259.951" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.313" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 267.7993 329.1987)" font-family="'MyriadPro-Regular'" font-size="8.0541">12</text>
  </g>
  <g id="sc-C_x7C_pl-13_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="271.26" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.306" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 279.2827 329.2085)" font-family="'MyriadPro-Regular'" font-size="8.0541">13</text>
  </g>
  <g id="sc-C_x7C_pl-14_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="282.863" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.879" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 290.9351 329.2168)" font-family="'MyriadPro-Regular'" font-size="8.0541">14</text>
  </g>
  <g id="sc-C_x7C_pl-15_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="294.456" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.876" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 302.7383 329.2168)" font-family="'MyriadPro-Regular'" font-size="8.0541">15</text>
  </g>
  <g id="sc-C_x7C_pl-16_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="306.34" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.884" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 313.9092 329.2119)" font-family="'MyriadPro-Regular'" font-size="8.0541">16</text>
  </g>
  <g id="sc-C_x7C_pl-17_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="318.225" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 326.3643 329.1978)" font-family="'MyriadPro-Regular'" font-size="8.0541">17</text>
  </g>
  <g id="sc-C_x7C_pl-18_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="329.825" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.319" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 337.6943 329.1978)" font-family="'MyriadPro-Regular'" font-size="8.0541">18</text>
  </g>
  <g id="sc-C_x7C_pl-19_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="341.135" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.585" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 349.6621 329.2188)" font-family="'MyriadPro-Regular'" font-size="8.0541">19</text>
  </g>
  <g id="sc-C_x7C_pl-20_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="352.729" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.596" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 361.9658 329.2139)" font-family="'MyriadPro-Regular'" font-size="8.0541">20</text>
  </g>
  <g id="sc-C_x7C_pl-21_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="364.614" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 373.4502 329.2139)" font-family="'MyriadPro-Regular'" font-size="8.0541">21</text>
  </g>
  <g id="sc-C_x7C_pl-22_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="376.217" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.594" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 385.4209 329.2139)" font-family="'MyriadPro-Regular'" font-size="8.0541">22</text>
  </g>
  <g id="sc-C_x7C_pl-23_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="387.811" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 396.4287 329.209)" font-family="'MyriadPro-Regular'" font-size="8.0541">23</text>
  </g>
  <g id="sc-C_x7C_pl-24_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="399.408" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.593" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 408.0732 329.2085)" font-family="'MyriadPro-Regular'" font-size="8.0541">24</text>
  </g>
  <g id="sc-C_x7C_pl-40_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="413.325" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 421.2305 368.5825)" font-family="'MyriadPro-Regular'" font-size="8.0541">40</text>
  </g>
  <g id="sc-C_x7C_pl-41_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="401.442" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.58" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 410.2324 368.5825)" font-family="'MyriadPro-Regular'" font-size="8.0541">41</text>
  </g>
  <g id="sc-C_x7C_pl-42_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="390.131" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.322" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 398.3691 368.583)" font-family="'MyriadPro-Regular'" font-size="8.0541">42</text>
  </g>
  <g id="sc-C_x7C_pl-43_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="378.534" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 386.498 368.5781)" font-family="'MyriadPro-Regular'" font-size="8.0541">43</text>
  </g>
  <g id="sc-C_x7C_pl-44_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="366.938" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.585" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 374.6348 368.5781)" font-family="'MyriadPro-Regular'" font-size="8.0541">44</text>
  </g>
  <g id="sc-C_x7C_pl-45_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="355.046" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.888" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 362.7734 368.583)" font-family="'MyriadPro-Regular'" font-size="8.0541">45</text>
  </g>
  <g id="sc-C_x7C_pl-46_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="343.45" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.596" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 352.417 368.5835)" font-family="'MyriadPro-Regular'" font-size="8.0541">46</text>
  </g>
  <g id="sc-C_x7C_pl-47_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="331.855" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 340.0488 368.5811)" font-family="'MyriadPro-Regular'" font-size="8.0541">47</text>
  </g>
  <g id="sc-C_x7C_pl-48_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="320.263" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.593" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 327.751 368.5767)" font-family="'MyriadPro-Regular'" font-size="8.0541">48</text>
  </g>
  <g id="sc-C_x7C_pl-49_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="308.659" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 316.5293 368.5859)" font-family="'MyriadPro-Regular'" font-size="8.0541">49</text>
  </g>
  <g id="sc-C_x7C_pl-50_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="296.774" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.885" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 304.8804 368.5859)" font-family="'MyriadPro-Regular'" font-size="8.0541">50</text>
  </g>
  <g id="sc-C_x7C_pl-51_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="284.886" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.599" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 293.4487 368.5815)" font-family="'MyriadPro-Regular'" font-size="8.0541">51</text>
  </g>
  <g id="sc-C_x7C_pl-52_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="273.578" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.599" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 282.4438 368.5859)" font-family="'MyriadPro-Regular'" font-size="8.0541">52</text>
  </g>
  <g id="sc-C_x7C_pl-53_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="261.694" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.582" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 269.936 368.604)" font-family="'MyriadPro-Regular'" font-size="8.0541">53</text>
  </g>
  <g id="sc-C_x7C_pl-54_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="250.093" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 258.0664 368.5864)" font-family="'MyriadPro-Regular'" font-size="8.0541">54</text>
  </g>
  <g id="sc-C_x7C_pl-55_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="238.498" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 246.8525 368.604)" font-family="'MyriadPro-Regular'" font-size="8.0541">55</text>
  </g>
  <g id="sc-C_x7C_pl-56_x7C_st-Lane3_x7C_gz-125">
    <polygon fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" points="226.905,354.656 
      238.498,354.656 238.498,375.243 226.905,375.243     "/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 235.4189 368.5869)" font-family="'MyriadPro-Regular'" font-size="8.0541">56</text>
  </g>
  <g id="sc-C_x7C_pl-57_x7C_st-Lane3_x7C_gz-125">
    <polygon fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" points="215.01,354.656 
      226.905,354.656 226.905,375.243 215.01,375.243    "/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 224.6289 368.5825)" font-family="'MyriadPro-Regular'" font-size="8.0541">57</text>
  </g>
  <g id="sc-C_x7C_pl-58_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="203.415" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 211.8979 368.5825)" font-family="'MyriadPro-Regular'" font-size="8.0541">58</text>
  </g>
  <g id="sc-C_x7C_pl-59_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="192.106" y="354.656" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.309" height="20.586"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 200.6782 368.583)" font-family="'MyriadPro-Regular'" font-size="8.0541">59</text>
  </g>
  <g id="sc-C_x7C_pl-79_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="413.325" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 421.2363 390.1587)" font-family="'MyriadPro-Regular'" font-size="8.0541">79</text>
  </g>
  <g id="sc-C_x7C_pl-78_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="401.442" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.58" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 410.2324 390.1587)" font-family="'MyriadPro-Regular'" font-size="8.0541">78</text>
  </g>
  <g id="sc-C_x7C_pl-77_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="390.131" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.322" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 398.3662 390.1631)" font-family="'MyriadPro-Regular'" font-size="8.0541">77</text>
  </g>
  <g id="sc-C_x7C_pl-76_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="378.534" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 386.498 390.1631)" font-family="'MyriadPro-Regular'" font-size="8.0541">76</text>
  </g>
  <g id="sc-C_x7C_pl-75_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="366.938" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.585" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 374.6357 390.1631)" font-family="'MyriadPro-Regular'" font-size="8.0541">75</text>
  </g>
  <g id="sc-C_x7C_pl-74_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="355.046" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.888" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 362.7734 390.1592)" font-family="'MyriadPro-Regular'" font-size="8.0541">74</text>
  </g>
  <g id="sc-C_x7C_pl-73_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="343.45" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.596" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 352.418 390.1597)" font-family="'MyriadPro-Regular'" font-size="8.0541">73</text>
  </g>
  <g id="sc-C_x7C_pl-72_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="331.855" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 340.0488 390.1572)" font-family="'MyriadPro-Regular'" font-size="8.0541">72</text>
  </g>
  <g id="sc-C_x7C_pl-71_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="320.263" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.593" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 327.7461 390.1704)" font-family="'MyriadPro-Regular'" font-size="8.0541">71</text>
  </g>
  <g id="sc-C_x7C_pl-70_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="308.659" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 316.5293 390.1577)" font-family="'MyriadPro-Regular'" font-size="8.0541">70</text>
  </g>
  <g id="sc-C_x7C_pl-69_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="296.774" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.885" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 304.8813 390.1621)" font-family="'MyriadPro-Regular'" font-size="8.0541">69</text>
  </g>
  <g id="sc-C_x7C_pl-68_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="284.886" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.599" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 293.4478 390.1621)" font-family="'MyriadPro-Regular'" font-size="8.0541">68</text>
  </g>
  <g id="sc-C_x7C_pl-67_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="273.578" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.599" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 282.4448 390.1709)" font-family="'MyriadPro-Regular'" font-size="8.0541">67</text>
  </g>
  <g id="sc-C_x7C_pl-66_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="261.694" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.582" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 269.9312 390.1582)" font-family="'MyriadPro-Regular'" font-size="8.0541">66</text>
  </g>
  <g id="sc-C_x7C_pl-65_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="250.093" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 258.0669 390.1626)" font-family="'MyriadPro-Regular'" font-size="8.0541">65</text>
  </g>
  <g id="sc-C_x7C_pl-64_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="238.498" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 246.853 390.1626)" font-family="'MyriadPro-Regular'" font-size="8.0541">64</text>
  </g>
  <g id="sc-C_x7C_pl-63_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="226.905" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.877" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 235.4194 390.1631)" font-family="'MyriadPro-Regular'" font-size="8.0541">63</text>
  </g>
  <g id="sc-C_x7C_pl-62_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="215.01" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.888" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 224.6294 390.1587)" font-family="'MyriadPro-Regular'" font-size="8.0541">62</text>
  </g>
  <g id="sc-C_x7C_pl-61_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="203.415" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 211.8989 390.1631)" font-family="'MyriadPro-Regular'" font-size="8.0541">61</text>
  </g>
  <g id="sc-C_x7C_pl-60_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="192.106" y="375.243" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.309" height="20.288"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 200.6792 390.1636)" font-family="'MyriadPro-Regular'" font-size="8.0541">60</text>
  </g>
  <g id="sc-C_x7C_pl-80_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="413.325" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.884" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 421.2354 429.418)" font-family="'MyriadPro-Regular'" font-size="8.0541">80</text>
  </g>
  <g id="sc-C_x7C_pl-81_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="401.727" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.888" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 410.2295 429.4189)" font-family="'MyriadPro-Regular'" font-size="8.0541">81</text>
  </g>
  <g id="sc-C_x7C_pl-82_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="390.131" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.596" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 398.3691 429.4189)" font-family="'MyriadPro-Regular'" font-size="8.0541">82</text>
  </g>
  <g id="sc-C_x7C_pl-83_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="378.534" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 386.4971 429.4189)" font-family="'MyriadPro-Regular'" font-size="8.0541">83</text>
  </g>
  <g id="sc-C_x7C_pl-84_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="366.938" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.585" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 374.6357 429.4189)" font-family="'MyriadPro-Regular'" font-size="8.0541">84</text>
  </g>
  <g id="sc-C_x7C_pl-85_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="355.343" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 362.7725 429.4238)" font-family="'MyriadPro-Regular'" font-size="8.0541">85</text>
  </g>
  <g id="sc-C_x7C_pl-86_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="343.742" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 352.417 429.4063)" font-family="'MyriadPro-Regular'" font-size="8.0541">86</text>
  </g>
  <g id="sc-C_x7C_pl-87_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="331.855" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 340.0439 429.417)" font-family="'MyriadPro-Regular'" font-size="8.0541">87</text>
  </g>
  <g id="sc-C_x7C_pl-88_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="320.263" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.876" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 327.7471 429.4229)" font-family="'MyriadPro-Regular'" font-size="8.0541">88</text>
  </g>
  <g id="sc-C_x7C_pl-89_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="308.659" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 316.5264 429.4229)" font-family="'MyriadPro-Regular'" font-size="8.0541">89</text>
  </g>
  <g id="sc-C_x7C_pl-90_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="296.774" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 304.8809 429.4229)" font-family="'MyriadPro-Regular'" font-size="8.0541">90</text>
  </g>
  <g id="sc-C_x7C_pl-91_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="285.462" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 293.4473 429.4229)" font-family="'MyriadPro-Regular'" font-size="8.0541">91</text>
  </g>
  <g id="sc-C_x7C_pl-92_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="273.868" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 282.4438 429.4277)" font-family="'MyriadPro-Regular'" font-size="8.0541">92</text>
  </g>
  <g id="sc-C_x7C_pl-93_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="261.985" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.88" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 269.9307 429.4229)" font-family="'MyriadPro-Regular'" font-size="8.0541">93</text>
  </g>
  <g id="sc-C_x7C_pl-94_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="250.093" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 258.0664 429.4238)" font-family="'MyriadPro-Regular'" font-size="8.0541">94</text>
  </g>
  <g id="sc-C_x7C_pl-95_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="238.498" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 246.8481 429.4287)" font-family="'MyriadPro-Regular'" font-size="8.0541">95</text>
  </g>
  <g id="sc-C_x7C_pl-96_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="226.905" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.593" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 235.4185 429.4238)" font-family="'MyriadPro-Regular'" font-size="8.0541">96</text>
  </g>
  <g id="sc-C_x7C_pl-97_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="215.305" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.593" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 224.6284 429.4238)" font-family="'MyriadPro-Regular'" font-size="8.0541">97</text>
  </g>
  <g id="sc-C_x7C_pl-98_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="203.704" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.603" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 211.8965 429.4238)" font-family="'MyriadPro-Regular'" font-size="8.0541">98</text>
  </g>
  <g id="sc-C_x7C_pl-99_x7C_st-Lane2_x7C_gz-125">
    
      <rect x="192.106" y="415.247" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.302"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 200.6816 429.4238)" font-family="'MyriadPro-Regular'" font-size="8.0541">99</text>
  </g>
  <g id="sc-C_x7C_pl-119_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="413.325" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.884" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 421.2393 450.9951)" font-family="'MyriadPro-Regular'" font-size="8.0541">119</text>
  </g>
  <g id="sc-C_x7C_pl-118_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="401.727" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.888" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 410.2314 451.0137)" font-family="'MyriadPro-Regular'" font-size="8.0541">118</text>
  </g>
  <g id="sc-C_x7C_pl-117_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="390.131" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.596" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 398.3711 451.0137)" font-family="'MyriadPro-Regular'" font-size="8.0541">117</text>
  </g>
  <g id="sc-C_x7C_pl-116_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="378.534" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 386.499 450.9961)" font-family="'MyriadPro-Regular'" font-size="8.0541">116</text>
  </g>
  <g id="sc-C_x7C_pl-115_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="366.938" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.585" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 374.6357 450.9961)" font-family="'MyriadPro-Regular'" font-size="8.0541">115</text>
  </g>
  <g id="sc-C_x7C_pl-114_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="355.343" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 362.7734 450.9961)" font-family="'MyriadPro-Regular'" font-size="8.0541">114</text>
  </g>
  <g id="sc-C_x7C_pl-113_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="343.742" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 352.4209 450.9873)" font-family="'MyriadPro-Regular'" font-size="8.0541">113</text>
  </g>
  <g id="sc-C_x7C_pl-112_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="331.855" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 340.0479 450.9932)" font-family="'MyriadPro-Regular'" font-size="8.0541">112</text>
  </g>
  <g id="sc-C_x7C_pl-111_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="320.263" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.876" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 327.751 450.9941)" font-family="'MyriadPro-Regular'" font-size="8.0541">111</text>
  </g>
  <g id="sc-C_x7C_pl-110_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="308.659" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 316.5283 450.9854)" font-family="'MyriadPro-Regular'" font-size="8.0541">110</text>
  </g>
  <g id="sc-C_x7C_pl-109_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="296.774" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 304.8892 450.9941)" font-family="'MyriadPro-Regular'" font-size="8.0541">109</text>
  </g>
  <g id="sc-C_x7C_pl-108_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="285.462" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 293.4492 450.9854)" font-family="'MyriadPro-Regular'" font-size="8.0541">108</text>
  </g>
  <g id="sc-C_x7C_pl-107_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="273.868" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 282.4468 451.0127)" font-family="'MyriadPro-Regular'" font-size="8.0541">107</text>
  </g>
  <g id="sc-C_x7C_pl-106_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="261.985" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.88" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 269.9326 451.0127)" font-family="'MyriadPro-Regular'" font-size="8.0541">106</text>
  </g>
  <g id="sc-C_x7C_pl-105_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="250.093" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.601" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 258.0684 450.9951)" font-family="'MyriadPro-Regular'" font-size="8.0541">105</text>
  </g>
  <g id="sc-C_x7C_pl-104_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="238.498" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.595" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 246.8525 451.0137)" font-family="'MyriadPro-Regular'" font-size="8.0541">104</text>
  </g>
  <g id="sc-C_x7C_pl-103_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="226.905" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.593" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 235.4214 450.9951)" font-family="'MyriadPro-Regular'" font-size="8.0541">103</text>
  </g>
  <g id="sc-C_x7C_pl-102_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="215.305" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.593" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 224.6323 451.0137)" font-family="'MyriadPro-Regular'" font-size="8.0541">102</text>
  </g>
  <g id="sc-C_x7C_pl-101_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="203.704" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.603" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 211.8984 450.9951)" font-family="'MyriadPro-Regular'" font-size="8.0541">101</text>
  </g>
  <g id="sc-C_x7C_pl-100_x7C_st-Lane1_x7C_gz-125">
    
      <rect x="192.106" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.598" height="20.871"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 200.6841 450.9951)" font-family="'MyriadPro-Regular'" font-size="8.0541">100</text>
  </g>
  <g id="sc-C_x7C_pl-138_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="191.822" y="510.639" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.148" height="11.021"/>
    <text transform="matrix(1 0 0 1 196.3364 518.9043)" font-family="'MyriadPro-Regular'" font-size="8.0541">138</text>
  </g>
  <g id="sc-C_x7C_pl-137_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="191.822" y="521.655" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.148" height="11.597"/>
    <text transform="matrix(1 0 0 1 196.3364 530.3379)" font-family="'MyriadPro-Regular'" font-size="8.0541">137</text>
  </g>
  <g id="sc-C_x7C_pl-136_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="191.822" y="533.543" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.148" height="11.598"/>
    <text transform="matrix(1 0 0 1 196.3364 541.9805)" font-family="'MyriadPro-Regular'" font-size="8.0541">136</text>
  </g>
  <g id="sc-C_x7C_pl-135_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="191.822" y="545.141" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.148" height="11.598"/>
    <text transform="matrix(1 0 0 1 196.3364 553.4238)" font-family="'MyriadPro-Regular'" font-size="8.0541">135</text>
  </g>
  <g id="sc-C_x7C_pl-134_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="191.822" y="556.443" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.148" height="11.604"/>
    <text transform="matrix(1 0 0 1 196.3364 565.5039)" font-family="'MyriadPro-Regular'" font-size="8.0541">134</text>
  </g>
  <g id="sc-C_x7C_pl-133_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="191.822" y="568.047" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.148" height="11.595"/>
    <text transform="matrix(1 0 0 1 196.3364 577.1504)" font-family="'MyriadPro-Regular'" font-size="8.0541">133</text>
  </g>
  <g id="sc-C_x7C_pl-132_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="191.822" y="579.642" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.148" height="11.602"/>
    <text transform="matrix(1 0 0 1 196.3364 588.8047)" font-family="'MyriadPro-Regular'" font-size="8.0541">132</text>
  </g>
  <g id="sc-C_x7C_pl-131_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="191.822" y="591.241" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.148" height="11.584"/>
    <text transform="matrix(1 0 0 1 196.3364 600.4521)" font-family="'MyriadPro-Regular'" font-size="8.0541">131</text>
  </g>
  <g id="sc-C_x7C_pl-129_x7C_st-2_x7C_gz-125">
    <polygon fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="191.822,614.725 213.275,614.725 
      213.275,630.38 191.822,643.718    "/>
    <text transform="matrix(1 0 0 1 196.3364 626.5215)" font-family="'MyriadPro-Regular'" font-size="8.0541">129</text>
  </g>
  <g id="sc-C_x7C_pl-120_x7C_st-3_x7C_gz-125">
    
      <rect x="213.275" y="510.639" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.165" height="11.021"/>
    <text transform="matrix(1 0 0 1 217.0444 518.8984)" font-family="'MyriadPro-Regular'" font-size="8.0541">120</text>
  </g>
  <g id="sc-C_x7C_pl-121_x7C_st-3_x7C_gz-125">
    
      <rect x="213.275" y="521.655" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.165" height="11.597"/>
    <text transform="matrix(1 0 0 1 217.0444 530.3379)" font-family="'MyriadPro-Regular'" font-size="8.0541">121</text>
  </g>
  <g id="sc-C_x7C_pl-122_x7C_st-3_x7C_gz-125">
    
      <rect x="213.275" y="533.543" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.165" height="11.598"/>
    <text transform="matrix(1 0 0 1 217.0444 541.9844)" font-family="'MyriadPro-Regular'" font-size="8.0541">122</text>
  </g>
  <g id="sc-C_x7C_pl-123_x7C_st-3_x7C_gz-125">
    
      <rect x="213.275" y="545.141" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.165" height="11.598"/>
    <text transform="matrix(1 0 0 1 217.0493 553.4238)" font-family="'MyriadPro-Regular'" font-size="8.0541">123</text>
  </g>
  <g id="sc-C_x7C_pl-124_x7C_st-3_x7C_gz-125">
    
      <rect x="213.275" y="556.443" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.165" height="11.604"/>
    <text transform="matrix(1 0 0 1 217.0493 565.498)" font-family="'MyriadPro-Regular'" font-size="8.0541">124</text>
  </g>
  <g id="sc-C_x7C_pl-125_x7C_st-3_x7C_gz-125">
    
      <rect x="213.275" y="568.047" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.165" height="11.595"/>
    <text transform="matrix(1 0 0 1 217.0493 577.1504)" font-family="'MyriadPro-Regular'" font-size="8.0541">125</text>
  </g>
  <g id="sc-C_x7C_pl-126_x7C_st-3_x7C_gz-125">
    
      <rect x="213.275" y="579.642" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.165" height="11.602"/>
    <text transform="matrix(1 0 0 1 217.0493 588.8047)" font-family="'MyriadPro-Regular'" font-size="8.0541">126</text>
  </g>
  <g id="sc-C_x7C_pl-127_x7C_st-3_x7C_gz-125">
    
      <rect x="213.275" y="591.241" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.165" height="11.584"/>
    <text transform="matrix(1 0 0 1 217.0493 600.4521)" font-family="'MyriadPro-Regular'" font-size="8.0541">127</text>
  </g>
  <g id="sc-C_x7C_pl-128_x7C_st-3_x7C_gz-125">
    <polygon fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="213.275,603.132 234.147,603.132 
      234.147,619.074 213.275,630.38    "/>
    <text transform="matrix(1 0 0 1 217.0493 616.375)" font-family="'MyriadPro-Regular'" font-size="8.0541">128</text>
  </g>
  <g id="sc-C_x7C_pl-164_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="510.639" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.306"/>
    <text transform="matrix(1 0 0 1 135.7173 518.9043)" font-family="'MyriadPro-Regular'" font-size="8.0541">164</text>
  </g>
  <g id="sc-C_x7C_pl-163_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="521.944" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.599"/>
    <text transform="matrix(1 0 0 1 135.7173 530.3379)" font-family="'MyriadPro-Regular'" font-size="8.0541">163</text>
  </g>
  <g id="sc-C_x7C_pl-162_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="533.543" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.598"/>
    <text transform="matrix(1 0 0 1 135.7173 541.9844)" font-family="'MyriadPro-Regular'" font-size="8.0541">162</text>
  </g>
  <g id="sc-C_x7C_pl-161_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="545.141" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.873"/>
    <text transform="matrix(1 0 0 1 135.7173 553.4238)" font-family="'MyriadPro-Regular'" font-size="8.0541">161</text>
  </g>
  <g id="sc-C_x7C_pl-160_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="557.025" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.595"/>
    <text transform="matrix(1 0 0 1 135.7173 565.5039)" font-family="'MyriadPro-Regular'" font-size="8.0541">160</text>
  </g>
  <g id="sc-C_x7C_pl-159_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="568.62" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.606"/>
    <text transform="matrix(1 0 0 1 135.7173 577.1504)" font-family="'MyriadPro-Regular'" font-size="8.0541">159</text>
  </g>
  <g id="sc-C_x7C_pl-158_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="580.225" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.593"/>
    <text transform="matrix(1 0 0 1 135.7173 588.8047)" font-family="'MyriadPro-Regular'" font-size="8.0541">158</text>
  </g>
  <g id="sc-C_x7C_pl-157_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="591.819" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.311"/>
    <text transform="matrix(1 0 0 1 135.7173 600.4521)" font-family="'MyriadPro-Regular'" font-size="8.0541">157</text>
  </g>
  <g id="sc-C_x7C_pl-156_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="603.417" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.595"/>
    <text transform="matrix(1 0 0 1 135.7173 611.8857)" font-family="'MyriadPro-Regular'" font-size="8.0541">156</text>
  </g>
  <g id="sc-C_x7C_pl-139_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="510.639" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.306"/>
    <text transform="matrix(1 0 0 1 156.4204 518.9043)" font-family="'MyriadPro-Regular'" font-size="8.0541">139</text>
  </g>
  <g id="sc-C_x7C_pl-140_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="521.944" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.599"/>
    <text transform="matrix(1 0 0 1 156.4204 530.3379)" font-family="'MyriadPro-Regular'" font-size="8.0541">140</text>
  </g>
  <g id="sc-C_x7C_pl-141_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="533.543" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.598"/>
    <text transform="matrix(1 0 0 1 156.4258 541.9844)" font-family="'MyriadPro-Regular'" font-size="8.0541">141</text>
  </g>
  <g id="sc-C_x7C_pl-142_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="545.141" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.873"/>
    <text transform="matrix(1 0 0 1 156.4258 553.4238)" font-family="'MyriadPro-Regular'" font-size="8.0541">142</text>
  </g>
  <g id="sc-C_x7C_pl-143_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="557.025" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.595"/>
    <text transform="matrix(1 0 0 1 156.4204 565.5039)" font-family="'MyriadPro-Regular'" font-size="8.0541">143</text>
  </g>
  <g id="sc-C_x7C_pl-144_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="568.62" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.606"/>
    <text transform="matrix(1 0 0 1 156.4204 577.1504)" font-family="'MyriadPro-Regular'" font-size="8.0541">144</text>
  </g>
  <g id="sc-C_x7C_pl-145_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="580.225" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.593"/>
    <text transform="matrix(1 0 0 1 156.4258 588.8047)" font-family="'MyriadPro-Regular'" font-size="8.0541">145</text>
  </g>
  <g id="sc-C_x7C_pl-146_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="591.819" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.311"/>
    <text transform="matrix(1 0 0 1 156.4258 600.4521)" font-family="'MyriadPro-Regular'" font-size="8.0541">146</text>
  </g>
  <g id="sc-C_x7C_pl-177_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.511" y="354.36" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.877" height="11.303"/>
    <text transform="matrix(1 0 0 1 135.7095 363.5747)" font-family="'MyriadPro-Regular'" font-size="8.0541">177</text>
  </g>
  <g id="sc-C_x7C_pl-178_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.511" y="365.673" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.877" height="11.602"/>
    <text transform="matrix(1 0 0 1 135.7095 375.0083)" font-family="'MyriadPro-Regular'" font-size="8.0541">178</text>
  </g>
  <g id="sc-C_x7C_pl-179_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.511" y="377.562" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.877" height="11.602"/>
    <text transform="matrix(1 0 0 1 135.7153 386.6636)" font-family="'MyriadPro-Regular'" font-size="8.0541">179</text>
  </g>
  <g id="sc-C_x7C_pl-180_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.511" y="389.153" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.877" height="11.599"/>
    <text transform="matrix(1 0 0 1 135.8765 397.2324)" font-family="'MyriadPro-Regular'" font-size="8.0541">180</text>
  </g>
  <g id="sc-C_x7C_pl-181_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.511" y="400.752" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.877" height="11.306"/>
    <text transform="matrix(1 0 0 1 135.8765 409.3086)" font-family="'MyriadPro-Regular'" font-size="8.0541">181</text>
  </g>
  <g id="sc-C_x7C_pl-182_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.511" y="412.06" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.877" height="11.885"/>
    <text transform="matrix(1 0 0 1 135.8765 420.959)" font-family="'MyriadPro-Regular'" font-size="8.0541">182</text>
  </g>
  <g id="sc-C_x7C_pl-183_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.511" y="423.953" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.877" height="11.882"/>
    <text transform="matrix(1 0 0 1 135.8765 432.6113)" font-family="'MyriadPro-Regular'" font-size="8.0541">183</text>
  </g>
  <g id="sc-C_x7C_pl-184_x7C_st-1_x7C_gz-125">
    
      <rect x="131.511" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.877" height="11.593"/>
    <text transform="matrix(1 0 0 1 135.7153 444.6914)" font-family="'MyriadPro-Regular'" font-size="8.0541">184</text>
  </g>
  <g id="sc-C_x7C_pl-176_x7C_st-2_x7C_gz-125">
    
      <rect x="152.672" y="354.36" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.587" height="11.303"/>
    <text transform="matrix(1 0 0 1 156.4175 363.5747)" font-family="'MyriadPro-Regular'" font-size="8.0541">176</text>
  </g>
  <g id="sc-C_x7C_pl-175_x7C_st-2_x7C_gz-125">
    
      <rect x="152.672" y="365.673" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.587" height="11.602"/>
    <text transform="matrix(1 0 0 1 156.4175 375.0083)" font-family="'MyriadPro-Regular'" font-size="8.0541">175</text>
  </g>
  <g id="sc-C_x7C_pl-174_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.672" y="377.562" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.587" height="11.602"/>
    <text transform="matrix(1 0 0 1 156.4175 386.6577)" font-family="'MyriadPro-Regular'" font-size="8.0541">174</text>
  </g>
  <g id="sc-C_x7C_pl-173_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.672" y="389.153" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.587" height="11.599"/>
    <text transform="matrix(1 0 0 1 156.5894 397.2324)" font-family="'MyriadPro-Regular'" font-size="8.0541">173</text>
  </g>
  <g id="sc-C_x7C_pl-172_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.672" y="400.752" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.587" height="11.306"/>
    <text transform="matrix(1 0 0 1 156.5894 409.3086)" font-family="'MyriadPro-Regular'" font-size="8.0541">172</text>
  </g>
  <g id="sc-C_x7C_pl-171_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.672" y="412.06" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.587" height="11.885"/>
    <text transform="matrix(1 0 0 1 156.5894 420.959)" font-family="'MyriadPro-Regular'" font-size="8.0541">171</text>
  </g>
  <g id="sc-C_x7C_pl-170_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.672" y="423.953" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.587" height="11.882"/>
    <text transform="matrix(1 0 0 1 156.5894 432.6113)" font-family="'MyriadPro-Regular'" font-size="8.0541">170</text>
  </g>
  <g id="sc-C_x7C_pl-169_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.672" y="435.546" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.587" height="11.593"/>
    <text transform="matrix(1 0 0 1 156.4175 444.6914)" font-family="'MyriadPro-Regular'" font-size="8.0541">169</text>
  </g>
  <g id="sc-C_x7C_pl-185_x7C_st-1_x7C_gz-125">
    
      <rect x="131.511" y="447.433" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.877" height="11.309"/>
    <text transform="matrix(1 0 0 1 135.7153 455.4824)" font-family="'MyriadPro-Regular'" font-size="8.0541">185</text>
  </g>
  <g id="sc-C_x7C_pl-168_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.672" y="447.433" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.587" height="11.309"/>
    <text transform="matrix(1 0 0 1 156.4175 455.4824)" font-family="'MyriadPro-Regular'" font-size="8.0541">168</text>
  </g>
  <g id="sc-C_x7C_pl-165_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.511" y="458.741" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="14.208" height="18.846"/>
    <text transform="matrix(1 0 0 1 132.147 469.7188)" font-family="'MyriadPro-Regular'" font-size="8.0541">165</text>
  </g>
  <g id="sc-C_x7C_pl-166_x7C_st-1_x7C_gz-125">
    
      <rect x="145.722" y="458.741" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.917" height="18.846"/>
    <text transform="matrix(1 0 0 1 146.231 470.3633)" font-family="'MyriadPro-Regular'" font-size="8.0541">166</text>
  </g>
  <g id="sc-C_x7C_pl-167_x7C_st-1_x7C_gz-125">
    
      <rect x="159.636" y="458.741" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="13.627" height="18.846"/>
    <text transform="matrix(1 0 0 1 159.7109 470.3633)" font-family="'MyriadPro-Regular'" font-size="8.0541">167   </text>
  </g>
  <g id="sc-C_x7C_pl-147_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="603.417" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.595"/>
    <text transform="matrix(1 0 0 1 156.4258 611.8857)" font-family="'MyriadPro-Regular'" font-size="8.0541">147</text>
  </g>
  <g id="sc-C_x7C_pl-155_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="615.012" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.878"/>
    <text transform="matrix(1 0 0 1 135.7153 624.1816)" font-family="'MyriadPro-Regular'" font-size="8.0541">155</text>
  </g>
  <g id="sc-C_x7C_pl-148_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="615.012" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.878"/>
    <text transform="matrix(1 0 0 1 156.4204 624.1816)" font-family="'MyriadPro-Regular'" font-size="8.0541">148</text>
  </g>
  <g id="sc-C_x7C_pl-154_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="626.898" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.603"/>
    <text transform="matrix(1 0 0 1 135.7173 636.0449)" font-family="'MyriadPro-Regular'" font-size="8.0541">154</text>
  </g>
  <g id="sc-C_x7C_pl-149_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="152.391" y="626.898" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="20.875" height="11.603"/>
    <text transform="matrix(1 0 0 1 156.4204 636.0449)" font-family="'MyriadPro-Regular'" font-size="8.0541">149</text>
  </g>
  <g id="sc-C_x7C_pl-153_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="638.501" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.597"/>
    <text transform="matrix(1 0 0 1 135.7173 646.8301)" font-family="'MyriadPro-Regular'" font-size="8.0541">153</text>
  </g>
  <g id="sc-C_x7C_pl-151_x7C_st-1_x7C_gz-125_1_">
    <polygon fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="131.221,661.693 152.391,661.693 
      152.391,674.45 131.221,692.428    "/>
    <text transform="matrix(1 0 0 1 136.5806 673.1982)" font-family="'MyriadPro-Regular'" font-size="8.0541">151</text>
  </g>
  <g id="sc-C_x7C_pl-150_x7C_st-2_x7C_gz-125">
    <polygon fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="152.391,638.501 173.26,638.501 
      173.26,655.606 152.391,674.45     "/>
    <text transform="matrix(1 0 0 1 156.4258 653.6465)" font-family="'MyriadPro-Regular'" font-size="8.0541">150</text>
  </g>
  <g id="sc-C_x7C_pl-25_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="411.001" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.596" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 419.4063 329.2085)" font-family="'MyriadPro-Regular'" font-size="8.0541">25</text>
  </g>
  <g id="sc-C_x7C_pl-26_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="422.599" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.888" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 431.0498 329.2134)" font-family="'MyriadPro-Regular'" font-size="8.0541">26</text>
  </g>
  <g id="sc-C_x7C_pl-27_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="434.494" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.599" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 443.1885 329.2129)" font-family="'MyriadPro-Regular'" font-size="8.0541">27</text>
  </g>
  <g id="sc-C_x7C_pl-28_x7C_st-Lane3_x7C_gz-125">
    
      <rect x="445.8" y="314.358" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="11.596" height="20.585"/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 453.8584 329.2129)" font-family="'MyriadPro-Regular'" font-size="8.0541">28</text>
  </g>
  <g id="sc-C_x7C_pl-29_x7C_st-Lane3_x7C_gz-125">
    <polygon fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="468.704,334.943 457.396,334.943 
      457.396,314.358 470.446,314.358     "/>
    
      <text transform="matrix(-1.240763e-005 -1 1 -1.240763e-005 465.5166 329.1992)" font-family="'MyriadPro-Regular'" font-size="8.0541">29</text>
  </g>
  <g id="sc-C_x7C_pl-30_x7C_st-Lane3_x7C_gz-125">
    <path fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M477.979,337.546
      c0,0-3.486-2.029-9.288-2.614l1.739-20.585c0,0,10.446,0.582,16.528,4.058L477.979,337.546z"/>
    <text transform="matrix(0.2429 -0.97 0.97 0.2429 477.0039 329.6094)" font-family="'MyriadPro-Regular'" font-size="8.0505">30</text>
  </g>
  <g id="sc-C_x7C_pl-31_x7C_st-Lane3_x7C_gz-125">
    <path fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M501.758,331.748
      c0,0-5.797-9.858-14.785-13.337l-8.975,19.135c0,0,5.802,3.774,7.251,6.092L501.758,331.748z"/>
    <text transform="matrix(0.6471 -0.7624 0.7624 0.6471 486.8848 337.3203)" font-family="'MyriadPro-Regular'" font-size="8.0541">31</text>
  </g>
  <g id="sc-C_x7C_pl-32_x7C_st-Lane3_x7C_gz-125">
    <path fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M509.006,349.728
      c0,0-0.587-7.535-7.253-17.975l-16.527,11.886c0,0,2.9,3.19,3.187,8.986L509.006,349.728z"/>
    <text transform="matrix(0.979 -0.2037 0.2037 0.979 493.5977 348.6704)" font-family="'MyriadPro-Regular'" font-size="8.045">32</text>
  </g>
  <g id="sc-C_x7C_pl-33_x7C_st-Lane3_x7C_gz-125">
    <path fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M506.975,368.863
      c0,0,3.766-7.537,2.031-19.135l-20.59,2.897c0,0,0.874,4.063-1.451,9.282L506.975,368.863z"/>
    <text transform="matrix(0.961 0.2765 -0.2765 0.961 494.5947 360.2646)" font-family="'MyriadPro-Regular'" font-size="8.0473">33</text>
  </g>
  <g id="sc-C_x7C_pl-34_x7C_st-Lane3_x7C_gz-125">
    <path fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M496.826,384.813l-14.492-15.081
      c0,0,3.481-3.187,4.637-7.828l20.007,6.955C506.391,370.311,504.363,377.562,496.826,384.813z"/>
    <text transform="matrix(0.8427 0.5384 -0.5384 0.8427 489.7959 371.3828)" font-family="'MyriadPro-Regular'" font-size="8.0547">34</text>
  </g>
  <g id="sc-C_x7C_pl-35_x7C_st-Lane3_x7C_gz-125">
    <path fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M474.791,374.661l5.511,20.004
      c0,0,12.467-4.349,16.524-9.848l-14.492-15.083C482.039,370.013,480.302,372.63,474.791,374.661z"/>
    <text transform="matrix(0.5821 0.8131 -0.8131 0.5821 478.9043 379.6904)" font-family="'MyriadPro-Regular'" font-size="8.0534">35</text>
  </g>
  <g id="sc-C_x7C_pl-36_x7C_st-Lane3_x7C_gz-125">
    <path fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M461.164,394.952l3.77-20.302
      c0,0,5.218,0.87,9.852,0l5.515,20.005C480.878,394.952,470.446,397.27,461.164,394.952z"/>
    <text transform="matrix(0.0257 0.9997 -0.9997 0.0257 467.1963 381.7554)" font-family="'MyriadPro-Regular'" font-size="8.0554">36</text>
  </g>
  <g id="sc-C_x7C_pl-37_x7C_st-Lane3_x7C_gz-125">
    <path fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M456.529,370.6c0,0,5.217,3.763,8.408,4.058
      l-3.771,20.296c0,0-11.595-2.029-17.393-8.116L456.529,370.6z"/>
    
      <text transform="matrix(-0.4459 0.8951 -0.8951 -0.4459 455.0479 378.6831)" font-family="'MyriadPro-Regular'" font-size="8.0548">37</text>
  </g>
  <g id="sc-C_x7C_pl-38_x7C_st-Lane3_x7C_gz-125">
    <path fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M450.727,363.058l-19.136,8.404
      c0,0,3.482,9.28,12.181,15.372l12.752-16.233L450.727,363.058z"/>
    <text transform="matrix(-0.8721 0.4893 -0.4893 -0.8721 447.123 368.626)" font-family="'MyriadPro-Regular'" font-size="8.0534">38</text>
  </g>
  <g id="sc-C_x7C_pl-39_x7C_st-Lane3_x7C_gz-125">
    <path fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" d="M428.112,354.36
      c0,0,0.281,12.758,3.479,17.101l19.144-8.404c0,0-1.747-4.351-1.163-6.089c0,0,0-2.314-2.899-2.608H428.112L428.112,354.36
      L428.112,354.36z"/>
    <text transform="matrix(-0.9413 0.3375 -0.3375 -0.9413 440.46 358.0249)" font-family="'MyriadPro-Regular'" font-size="8.0534">39</text>
  </g>
  <g id="sc-C_x7C_pl-1_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="314.939" fill="#EAD5C9" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.462" height="22.903"/>
    <g>
      <text transform="matrix(1 0 0 1 89.2358 330.3579)" font-family="'MyriadPro-Regular'" font-size="10.3495">1</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-2_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="337.843" fill="#EAD5C9" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.462" height="23.191"/>
    <g>
      <text transform="matrix(1 0 0 1 89.2358 353.0073)" font-family="'MyriadPro-Regular'" font-size="10.3495">2</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-3_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="361.026" fill="#EAD5C9" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.462" height="23.491"/>
    <g>
      <text transform="matrix(1 0 0 1 89.2358 375.6611)" font-family="'MyriadPro-Regular'" font-size="10.3495">3</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-4_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="384.517" fill="#EAD5C9" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.462" height="23.482"/>
    <g>
      <text transform="matrix(1 0 0 1 89.2358 398.3135)" font-family="'MyriadPro-Regular'" font-size="10.3495">4</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-5_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="407.712" fill="#EAD5C9" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.462" height="23.491"/>
    <g>
      <text transform="matrix(1 0 0 1 89.2915 422.5605)" font-family="'MyriadPro-Regular'" font-size="10.3495">5</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-152_x7C_st-1_x7C_gz-125_1_">
    
      <rect x="131.221" y="650.096" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.169" height="11.88"/>
    <text transform="matrix(1 0 0 1 136.6543 658.0605)" font-family="'MyriadPro-Regular'" font-size="8.0541">152</text>
  </g>
  <g id="sc-C_x7C_pl-6_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="431.197" fill="#EAD5C9" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.462" height="23.496"/>
    <g>
      <text transform="matrix(1 0 0 1 89.2915 445.2109)" font-family="'MyriadPro-Regular'" font-size="10.3495">6</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-7_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="454.386" fill="#EAD5C9" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.462" height="22.903"/>
    <g>
      <text transform="matrix(1 0 0 1 89.2358 468.2871)" font-family="'MyriadPro-Regular'" font-size="10.3495">7</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-8_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="510.639" fill="#E9D5C7" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.175" height="23.196"/>
    <g>
      <text transform="matrix(1 0 0 1 88.8711 525.0996)" font-family="'MyriadPro-Regular'" font-size="10.3495">8</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-9_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="533.832" fill="#E9D5C7" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.175" height="23.182"/>
    <g>
      <text transform="matrix(1 0 0 1 88.8711 548.6816)" font-family="'MyriadPro-Regular'" font-size="10.3495">9</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-10_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="557.025" fill="#E9D5C7" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.175" height="23.493"/>
    <g>
      <text transform="matrix(1 0 0 1 86.2163 571.9863)" font-family="'MyriadPro-Regular'" font-size="10.3495">10</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-11_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="580.512" fill="#E9D5C7" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.175" height="23.181"/>
    <g>
      <text transform="matrix(1 0 0 1 86.2163 595.7168)" font-family="'MyriadPro-Regular'" font-size="10.3495">11</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-12_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="603.706" fill="#E9D5C7" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.175" height="23.186"/>
    <g>
      <text transform="matrix(1 0 0 1 86.2163 617.4297)" font-family="'MyriadPro-Regular'" font-size="10.3495">12</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-130_x7C_st-2_x7C_gz-125_1_">
    
      <rect x="191.822" y="603.132" fill="#F2ECC8" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="21.148" height="11.589"/>
    <text transform="matrix(1 0 0 1 196.3364 612.0469)" font-family="'MyriadPro-Regular'" font-size="8.0541">130</text>
  </g>
  <g id="sc-C_x7C_pl-13_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="626.898" fill="#E9D5C7" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.175" height="23.498"/>
    <g>
      <text transform="matrix(1 0 0 1 86.2163 641.1582)" font-family="'MyriadPro-Regular'" font-size="10.3495">13</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-14_x7C_st-1_x7C_gz-500">
    
      <rect x="71.495" y="650.385" fill="#E9D5C7" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.175" height="23.186"/>
    <g>
      <text transform="matrix(1 0 0 1 86.2163 664.8887)" font-family="'MyriadPro-Regular'" font-size="10.3495">14</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-14_x7C_st-1_x7C_gz-500_1_">
    
      <rect x="71.495" y="673.584" fill="#E9D5C7" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10.0003" width="41.175" height="22.915"/>
    <g>
      <text transform="matrix(1 0 0 1 86.2163 688.1758)" font-family="'MyriadPro-Regular'" font-size="10.3495">15</text>
    </g>
  </g>
  <g id="sc-C_x7C_pl-16_x7C_st-1_x7C_gz-500">
    <polygon fill="#E9D5C7" stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="112.67,696.485 112.67,710.401 
      102.23,720.548 71.495,720.261 71.495,696.485    "/>
    <g>
      <text transform="matrix(1 0 0 1 86.2163 711.9102)" font-family="'MyriadPro-Regular'" font-size="10.3495">16</text>
    </g>
  </g>
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