
    <!-- 비주얼 영역 -->
    <div class="visual visual--sub">
        <div class="background background--black">
            <img src="./images/visual/sub.jpg" alt="비주얼 이미지" title="비주얼 이미지">
        </div>
        <div class="visual__content container">
            <div class="text-center">
                <div class="fx-3 text-gray">한지상품판매관</div>
                <div class="fx-7 text-white">온라인스토어</div>
            </div>
        </div>
    </div>
    <!-- /비주얼 영역 -->

    <!-- 검색 -->
    <div class="container py-5">
        <div class="px-5 py-3 text-center border">
            <div class="d-center">
                <div id="search" class="w-100" data-name="search_tags"></div>
                <button id="btn-search" class="icon text-red ml-3"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <!-- /검색 -->

    <!-- 상품 리스트 -->
    <div class="container py-5">
        <div class="d-between">
            <div>
                <hr class="bg-red">
                <div class="title text-red">상품 목록</div>
            </div>
            <?php if(company()):?>
            <button class="btn-bordered" data-toggle="modal" data-target="#entry-modal">상품 등록</button>
            <?php endif;?>
        </div>
        <div id="store-content" class="row mt-4">
            
        </div>
    </div>
    <!-- /상품 리스트 -->

    <!-- 장바구니 -->
    <div class="bg-gray">
        <div class="container py-5">
            <div class="t-head">
                <div class="cell-50">상품 정보</div>
                <div class="cell-20">수량</div>
                <div class="cell-20">합계 포인트</div>
                <div class="cell-10">-</div>
            </div>
            <div id="cart-content">

            </div>
            <div class="d-between mt-5">
                <div>
                    <span class="fx-n1">총 합계 포인트</span>
                    <span id="total-point" class="fx-4 text-red ml-2">0</span>
                    <span class="fx-n1 text-muted">p</span>
                </div>
                <?php if(user()):?>
                <div>
                    <span class="fx-n1">보유 포인트</span>
                    <span class="fx-4 text-red ml-2"><?=user()->point?></span>
                    <span class="fx-n1 text-muted">p</span>
                </div>
                <?php endif;?>
                <form action="/store/buy" method="post">
                    <input type="hidden" id="buyList" name="buy_list">
                    <input type="hidden" id="totalPoint" name="total_point">
                    <input type="hidden" id="totalCount" name="total_count">
                    <button id="btn-accept" class="btn-filled">구매 완료</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /장바구니 -->
    <script src="./js/store.js"></script>

    <form id="entry-modal" class="modal fade" action="/insert/paper" method="post" enctype="multipart/form-data">
        <input type="hidden" name="uid" value="<?=company()->id?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="fx-4">상품 등록</div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="file-base-64">
                        <label>이미지</label>
                    <input type="file" id="file-image" class="form-control" accept="image/*" name="image" required>
                    </div>
                    <div class="form-group">
                        <label>이름</label>
                        <input type="text" name="paper_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>업체명</label>
                        <input type="text" name="company_name" class="form-control" value="<?= company()->user_name ?>" readonly required>
                    </div>
                    <div class="form-group">
                        <label>가로 사이즈</label>
                        <input type="number" name="width_size" class="form-control" min="100" max="1000" required>
                    </div>
                    <div class="form-group">
                        <label>세로 사이즈</label>
                        <input type="number" name="height_size" class="form-control" min="100" max="1000" required>
                    </div>
                    <div class="form-group">
                        <label>포인트</label>
                        <input type="number" name="point" class="form-control" min="10" max="1000" step="10" required>
                    </div>
                    <div class="form-group">
                        <label>해시태그</label>
                        <div id="entry-tags" data-name="hash_tags"></div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button class="btn-filled">추가 완료</button>
                </div>
            </div>
        </div>
    </form>