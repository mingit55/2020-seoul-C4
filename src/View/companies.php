<!-- 비주얼 영역 -->
<div class="visual visual--sub">
        <div class="background background--black">
            <img src="./images/visual/sub.jpg" alt="비주얼 이미지" title="비주얼 이미지">
        </div>
        <div class="visual__content container">
            <div class="text-center">
                <div class="fx-3 text-gray">한지상품판매관</div>
                <div class="fx-7 text-white">한지업체</div>
            </div>
        </div>
    </div>
    <!-- /비주얼 영역 -->

<div class="container py-5">
    <hr>
    <div class="title">우수 업체</div>
    <div class="row mt-4">
        <?php foreach($rankers as $ranker):?>
        <div class="col-lg-4">
            <div class="bg-white border">
                <img src="<?=$ranker->image?>" alt="이미지" class="fit-contain hx-200 p-3">
                <div class="p-3">
                    <div>
                        <span class="fx-2"><?= enc($ranker->user_name) ?></span>
                        <span class="badge badge-danger">우수업체</span>
                    </div>
                    <div class="fx-n2 text-muted"><?= enc($ranker->user_email) ?></div>
                    <div class="fx-2 mt-3 text-yellow"><?= $ranker->total_point ?>p</div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>


<div class="container py-5">
    <hr>
    <div class="title">모든 업체</div>
    <div class="row mt-4">
    <?php foreach($companies->data as $company):?>
        <div class="col-lg-4">
            <div class="bg-white border">
                <img src="<?=$company->image?>" alt="이미지" class="fit-contain hx-200 p-3">
                <div class="p-3">
                    <div>
                        <span class="fx-2"><?= enc($company->user_name) ?></span>
                    </div>
                    <div class="fx-n2 text-muted"><?= enc($company->user_email) ?></div>
                    <div class="fx-2 mt-3 text-yellow"><?= enc($company->total_point) ?>p</div>
                </div>
            </div>
        </div>
        <?php endforeach;?>  
    </div>
    <div class="mt-4">
        <div class="d-flex justify-content-center">
            <a href="/companies?page=<?=$companies->prevPage?>" class="icon text-yellow" <?=$companies->prev ? 'disabled': ''?>><i class="fa fa-angle-left"></i></a>
            <?php for($i = $companies->start; $i <= $companies->end; $i++):?>
            <a href="/companies?page=<?=$i?>" class="icon bg-yellow text-white"><?=$i?></a>
            <?php endfor;?>
            <a href="/companies?page=<?=$companies->nextPage?>" class="icon text-yellow" <?=$companies->next ? 'disabled': ''?>><i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</div>