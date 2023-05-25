<div class="product__filter-sort">
    <div class="container">
        <div class="row">
            <div class="col" style="--w-md:6;">
                <div class="product__filter d-flex">
                    <div class="sort__item h5">
                        Bộ lọc:
                    </div>
                    <div class="filter__item h5">
                        <details class="sort__select p-relative">
                            <summary class="cursor-pointer d-flex align-center">
                                Giá
                                <img src="./assets/images/icon/icon-chevron-down.svg" alt="down" class="icon-open d-block" style="margin-left: 8px;">
                                <img src="./assets/images/icon/chevron-up.svg" alt="up" class="icon-close d-none" style="margin-left: 8px;">
                            </summary>
                            <div class="sort__selectbox p-absolute">
                                <div class="selectbox__top d-flex space-between">
                                    <span class="selectbox__lable">Tìm kiếm sản phẩm theo mức giá</span>
                                    <a href="#">Reset</a>
                                </div>
                                <div class="selectbox__inputs">
                                    <div class="selectbox__input d-flex">
                                        <div class="row">
                                            <div class="col d-flex align-center" style="--w:6;">
                                                <span class="symbol-money">₫</span>
                                                <input class="w-100" type="text" id="price-from" placeholder="Từ">
                                            </div>
                                            <div class="col d-flex align-center" style="--w:6;">
                                                <span class="symbol-money">₫</span>
                                                <input class="w-100" type="text" id="price-to" placeholder="Đến">
                                            </div>
                                            <div class="col text-right mg-t-20" style="--w:12;">
                                                <a href="" onclick="setHref();" class="btn btn__solid" id="sort-price">Áp dụng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </details>
                    </div>
                    
                </div>
            </div>
            <div class="col" style="--w-md:6;">
                <div class="product__sort d-flex">
                    <div class="sort__item h5">
                        Sắp xếp theo:
                    </div>
                    <div class="sort__item h5">
                        <details class="sort__select p-relative">
                            <summary class="cursor-pointer d-flex align-center">
                                Giá
                                <img src="./assets/images/icon/icon-chevron-down.svg" alt="down" class="icon-open d-block" style="margin-left: 8px;">
                                <img src="./assets/images/icon/chevron-up.svg" alt="up" class="icon-close d-none" style="margin-left: 8px;">
                            </summary>
                            <div class="sort__selectbox p-absolute">
                                <div class="selectbox__item">
                                    <a href="" onclick="ascPrice()" id="price-asc">Giá từ thấp đến cao</a>
                                </div>
                                <div class="selectbox__item">
                                    <a href="" onclick="descPrice()" id="price-desc">Giá từ cao đến thấp</a>
                                </div>
                            </div>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var currentURL = window.location.href;
    console.log(currentURL);
    var sortPrice = document.getElementById('sort-price');

    function setHref() {
        var priceFrom = document.getElementById('price-from').value;
        var priceTo = document.getElementById('price-to').value;
        var link = currentURL + "&pricefrom=" + priceFrom + "&priceto=" + priceTo;
        sortPrice.href = link;
        console.log(link);
    }

    function ascPrice() {
        var priceAsc = document.getElementById('price-asc');
        var link = currentURL + "&pricesort=1";
        priceAsc.href = link;
    }

    function descPrice() {
        var priceDesc = document.getElementById('price-desc');
        var link = currentURL + "&pricesort=2";
        priceDesc.href = link;
    }
</script>