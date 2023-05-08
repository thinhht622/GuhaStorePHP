<?php
    $sql_category_list = "SELECT * FROM category ORDER BY category_id DESC LIMIT 8";
    $query_category_list = mysqli_query($mysqli, $sql_category_list);
    $row = mysqli_fetch_array($query_category_list);
?>
<section class="collage pd-top">
    <div class="container">
        <h2 class="collage__heading heading-3">Danh mục</h2>
        <div class="collage__items d-grid">
            <div class="collage__item collage__item--large d-flex flex-column h-100">
                <img class="w-100 d-block object-fit-cover flex-1" src="./assets/images/banner/image-banner-1.webp" alt="image banner" />
                <div class="collage__container">
                    <div class="collage__content d-flex">
                        <a class="align-center" href="#">  </a>
                        <img src="./assets/images/icon/icon-nextlink.svg" alt="next-link" style="margin-left: 8px" />
                    </div>
                </div>
            </div>
            <div class="collage__item d-flex flex-column h-100">
                <img class="w-100 d-block object-fit-cover flex-1" src="./assets/images/banner/image-banner-1.webp" alt="image banner" />
                <div class="collage__container">
                    <div class="collage__content d-flex">
                        <a class="align-center" href="#"> Shoes </a>
                        <img src="./assets/images/icon/icon-nextlink.svg" alt="next-link" style="margin-left: 8px" />
                    </div>
                </div>
            </div>
            <div class="collage__item d-flex flex-column h-100">
                <img class="w-100 d-block object-fit-cover flex-1" src="./assets/images/banner/image-banner-1.webp" alt="image banner" />
                <div class="collage__container">
                    <div class="collage__content d-flex">
                        <a class="align-center" href="#"> Shoes </a>
                        <img src="./assets/images/icon/icon-nextlink.svg" alt="next-link" style="margin-left: 8px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>