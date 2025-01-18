
<aside class="booking-sidebar">
    <div class="widget filters">
        <h2 class="title">filters</h2>
        <div class="filters-wrap">
            <h2 class="widget-title">Price Range</h2>
            <div class="price_filter">
                <div id="slider-range"></div>
                <div class="price_slider_amount">
                    <span>Price :</span>
                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                    <input type="submit" class="btn" value="Filter">
                </div>
            </div>
        </div>
    </div>
    <div class="widget">
        <h2 class="widget-title">Departure Time</h2>
        <ul class="departure-wrap">
            <li><a href="#"><i class="flaticon-sunrise"></i>00:00 - 05:59</a></li>
            <li><a href="#"><i class="flaticon-sunny"></i>06:00 - 11:59</a></li>
            <li><a href="#"><i class="flaticon-sunset"></i>12:00 - 17:59</a></li>
            <li><a href="#"><i class="flaticon-crescent-moon"></i>18:00 - 23:59</a></li>
        </ul>
    </div>
    <div class="widget">
        <h2 class="widget-title">Number of Stops</h2>
        <form action="#" class="flight-stops">
            <label for="stopNumber"><i class="flaticon-flight"></i></label>
            <select id="stopNumber" name="select" class="form-select" aria-label="Default select example">
                <option value="">Direct</option>
                <option>One Stops</option>
                <option>Two Stops</option>
            </select>
        </form>
    </div>
    <div class="widget">
        <h2 class="widget-title">Airlines</h2>
        <ul class="airlines-cat-list">
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="catOne">
                    <label class="form-check-label" for="catOne">Etihad Airway<span>(12)</span></label>
                </div>
            </li>
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="catTwo">
                    <label class="form-check-label" for="catTwo">Lankan Airlines<span>(09)</span></label>
                </div>
            </li>
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="catThree">
                    <label class="form-check-label" for="catThree">Dubai Airway<span>(12)</span></label>
                </div>
            </li>
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="catFour">
                    <label class="form-check-label" for="catFour">NOVOAIR<span>(36)</span></label>
                </div>
            </li>
        </ul>
    </div>
    <div class="widget">
        <h2 class="widget-title">Weights</h2>
        <ul class="airlines-cat-list weights-list">
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="weightsOne">
                    <label class="form-check-label" for="weightsOne">25 KG</label>
                </div>
            </li>
        </ul>
    </div>
    <div class="widget">
        <h2 class="widget-title">Refundable</h2>
        <ul class="airlines-cat-list">
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="refOne">
                    <label class="form-check-label" for="refOne">Non Refundable</label>
                </div>
            </li>
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="refTwo">
                    <label class="form-check-label" for="refTwo">Refundable</label>
                </div>
            </li>
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="refThree">
                    <label class="form-check-label" for="refThree">Rules Wise</label>
                </div>
            </li>
        </ul>
    </div>
</aside>
