<!-- Featured Properties start -->
<div class="bg-active featured-properties mt-5 px-3 py-4">
 <div class="">
      <!-- Main title -->
      <div class="main-title abtclr">
         <h1 class="text-white">Connections</h1>
         <p class="m-auto text-white w-75">With excellent transport routes such as the Port Road, Jinnah Avenue and the N10 [Makran Coastal Highway] within easy reach, local and national amenities are easily accessible; and to travel to more exotic places, the New Gwadar airport is just 20-minutes out- side of BCG. </p>
      </div>


<div class="justify-content-around row">
      



<div class="flex-parent pt-5 pb-5">
      <div class="input-flex-container">
            <div class="input-timeline active">
                  <span data-year="300m" data-info="Zero Point"></span>
            </div>
            <div class="input-timeline bcg-logo">
                  <span data-year="BCG" data-info="BCG"></span>
            </div>
            <div class="input-timeline">
                  <span data-year="2km" data-info="Diplomatic Enclave"></span>
            </div>
            <div class="input-timeline">
                  <span data-year="3km" data-info="New Secretariat &amp; Golf &amp; Sport"></span>
            </div>
            <div class="input-timeline">
                  <span data-year="4km" data-info="Education City"></span>
            </div>
            <div class="input-timeline">
                  <span data-year="6km" data-info="Marine Drive"></span>
            </div>
            <div class="input-timeline">
                  <span data-year="7km" data-info="Turbat University"></span>
            </div>
            <div class="input-timeline">
                  <span data-year="16km" data-info="Airport"></span>
            </div>
            <div class="input-timeline">
                  <span data-year="23km" data-info="Sea Port & Industrial State"></span>
            </div>
      </div>

</div>





     
                
</div><!-- row end -->


   </div>
</div>




<style>
  .input-timeline span {
    color: #fff;
}

.flex-parent {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

.input-flex-container {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 90vw;
  height: 100px;
  max-width: 1280px;
  position: relative;
  z-index: 0;
}

.input-timeline {
  width: 25px;
  height: 25px;
  background-color: #ffffff;
  position: relative;
  border-radius: 50%;
}
.input-timeline:hover {
  cursor: pointer;
}
.input-timeline::before, .input-timeline::after {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  top: 50%;
  transform: translateY(-50%);
  background-color: #ffffff;
  width: 5vw;
  height: 5px;
  max-width: 80px;
}
.input-timeline::before {
  left: calc(-4vw + 12.5px);
}
.input-timeline::after {
  right: calc(-4vw + 12.5px);
}
.input-timeline.active {
      background-color: #b71c1c;
}
.input-timeline.active::before {
      background-color: #b71c1c;
}
.input-timeline.active::after {
background-color: #fbe24c;
}
.input-timeline.active span {
  font-weight: 700;
}
.input-timeline.active span::before {
}
.input-timeline.active span::after {
}
.input-timeline.active ~ .input-timeline, .input-timeline.active ~ .input-timeline::before, .input-timeline.active ~ .input-timeline::after {
 background-color: #fbe24c;
}
.input-timeline span {
  width: 1px;
  height: 1px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  visibility: hidden;
}
.input-timeline span::before, .input-timeline span::after {
  visibility: visible;
  position: absolute;
  left: 36%;
}
.input-timeline span::after {
  content: attr(data-year);
  top: 25px;
  transform: translateX(-50%);
  font-size: 15px;
}
.input-timeline span::before {
  content: attr(data-info);
  top: -65px;
  width: 118px;
  font-size: 14px;
  text-indent: 0;
  text-align: center;
  left: -55px;
}
.input-timeline.bcg-logo span::before {
    content: "";
    width: 65px;
    height: 60px;
    background-image: url(img/logos/black-logo.png);
    background-size: 195px;
    background-repeat: no-repeat;
    background-color: #ffffff;
    background-position: 0px 3px;
    left: -34px;
    top: -80px;
    border-radius: 50px;
    border: 2px solid transparent;
}
.input-timeline.bcg-logo.active span::before {
    border: 2px solid #b71c1c;
}
@media (min-width: 1250px) {
  .input-timeline::before {
    left: -70.5px;
  }

  .input-timeline::after {
    right: -70.5px;
  }
}
@media (max-width: 850px) {
  .input-timeline {
    width: 17px;
    height: 17px;
  }
  .input-timeline::before, .input-timeline::after {
    height: 3px;
  }
  .input-timeline::before {
    left: calc(-4vw + 8.5px);
  }
  .input-timeline::after {
    right: calc(-4vw + 8.5px);
  }
}
@media (max-width: 600px) {
  .flex-parent {
    justify-content: initial;
  }

  .input-flex-container {
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
    height: auto;
    margin-top: 15vh;
  }

  .input-timeline {
    width: 60px;
    height: 60px;
    margin: 0 10px 50px;
    background-color: #AEB6BF;
  }
  .input-timeline::before, .input-timeline::after {
    content: none;
  }
  .input-timeline span {
    width: 100%;
    height: 100%;
    display: block;
  }
  .input-timeline span::before {
    top: calc(100% + 5px);
    transform: translateX(-50%);
    text-indent: 0;
    text-align: center;
  }
  .input-timeline span::after {
    top: 50%;
    transform: translate(-50%, -50%);
    color: #ECF0F1;
  }

}
</style>

