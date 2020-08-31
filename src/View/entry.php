 <!-- 비주얼 영역 -->
 <div class="visual visual--sub">
        <div class="background background--black">
            <img src="./images/visual/sub.jpg" alt="비주얼 이미지" title="비주얼 이미지">
        </div>
        <div class="visual__content container">
            <div class="text-center">
                <div class="fx-3 text-gray">한지공예대전</div>
                <div class="fx-7 text-white">출품신청</div>
            </div>
        </div>
    </div>
    <!-- /비주얼 영역 -->

    <!-- 공예 작업 -->
    <div class="py-5">
        <div id="workspace">
            <div class="workspace__inner">
                <canvas width="1150" height="600"></canvas>
            </div>
            <div class="tool">
                <div class="tool__item tool__item--tool" data-type="select">
                    <i class="fa fa-mouse-pointer"></i>
                </div>
                <div class="tool__item tool__item--tool" data-type="spin">
                    <i class="fa fa-repeat"></i>
                </div>
                <div class="tool__item tool__item--tool" data-type="cut">
                    <i class="fa fa-cut"></i>
                </div>
                <div class="tool__item tool__item--tool" data-type="glue">
                    <i class="fa fa-object-ungroup"></i>
                </div>
                <div class="tool__item" data-toggle="modal" data-target="#list-modal">
                    <i class="fa fa-plus"></i>
                </div>
                <div class="tool__item">
                    <i class="fa fa-trash"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- /공예 작업 -->

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-5">
                <hr>
                <div class="title">출품 정보</div>
                <form action="#" class="mt-4">
                    <div class="form-group">
                        <label>제목</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>설명</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>해시태그</label>
                        <div id="hash_tags" data-name="hash_tags"></div>
                    </div>
                </form>
            </div>
            <div class="col-lg-7">
                <hr>
                <div class="title">도움말</div>
                <div class="mt-4">
                    <input type="radio" id="tab-select" name="tabs" hidden checked>
                    <input type="radio" id="tab-spin" name="tabs" hidden>
                    <input type="radio" id="tab-cut" name="tabs" hidden>
                    <input type="radio" id="tab-glue" name="tabs" hidden>
                    <div class="tab__search mb-2">
                        <input type="text">
                        <div class="icon icon-search">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="icon icon-left">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="icon icon-right">
                            <i class="fa fa-angle-right"></i>
                        </div>
                        <p class="fx-n2 text-muted"></p>
                    </div>
                    <div class="tab__title">
                        <label for="tab-select" class="tab select">선택</label>
                        <label for="tab-spin" class="tab spin">회전</label>
                        <label for="tab-cut" class="tab cut">자르기</label>
                        <label for="tab-glue" class="tab glue">붙이기</label>
                    </div>
                    <div class="tab__content">
                        <div class="tab select" data-type="select">선택 도구는 가장 기본적인 도구로써, 작업 영역 내의 한지를 선택할 수 있게 합니다. 
                            마우스 클릭으로 한지를 활성화하여 이동시킬 수 있으며, 선택된 한지는 삭제 버튼으로 삭제시킬 수 있습니다.</div>
                        <div class="tab spin" data-type="spin">회전 도구는 작업 영역 내의 한지를 회전할 수 있는 도구입니다. 
                            마우스 더블 클릭으로 회전하고자 하는 한지를 선택하면, 좌우로 마우스를 끌어당겨 회전시킬 수 있습니다. 
                            회전한 뒤에는 우 클릭의 콘텍스트 메뉴로 '확인'을 눌러 한지의 회전 상태를 작업 영역에 반영할 수 있습니다.</div>
                        <div class="tab cut" data-type="cut">자르기 도구는 작업 영역 내의 한지를 자를 수 있는 도구입니다. 
                            마우스 더블 클릭으로 자르고자 하는 한지를 선택하면 마우스를 움직임으로써 자르고자 하는 궤적을 그릴 수 있습니다. 
                            궤적을 그린 뒤에는 우 클릭의 콘텍스트 메뉴로 '자르기'를 눌러 그려진 궤적에 따라 한지를 자를 수 있습니다.</div>
                        <div class="tab glue" data-type="glue">붙이기 도구는 작업 영역 내의 한지들을 붙일 수 있는 도구입니다.
                            마우스 더블 클릭으로 붙이고자 하는 한지를 선택하면 처음 선택한 한지와 근접한 한지들을 선택할 수 있습니다. 
                            붙일 한지를 모두 선택한 뒤에는 우 클릭의 콘텍스트 메뉴로 '붙이기'를 눌러 선택한 한지를 붙일 수 있습니다.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/entry/Tool.js"></script>
    <script src="./js/entry/Select.js"></script>
    <script src="./js/entry/Spin.js"></script>
    <script src="./js/entry/Cut.js"></script>
    <script src="./js/entry/Glue.js"></script>
    <script src="./js/entry/Workspace.js"></script>
    <script src="./js/entry/Paper.js"></script>
    <script src="./js/entry/Source.js"></script>
    <script src="./js/entry.js"></script>

    <div id="list-modal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="fx-5">추가하기</div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>