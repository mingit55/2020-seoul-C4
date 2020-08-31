<!-- 비주얼 영역 -->
<div class="visual visual--sub">
    <div class="background background--black">
        <img src="./images/visual/sub.jpg" alt="비주얼 이미지" title="비주얼 이미지">
    </div>
    <div class="visual__content container">
        <div class="text-center">
            <div class="fx-3 text-gray">축제 공지사항</div>
            <div class="fx-7 text-white">알려드립니다</div>
        </div>
    </div>
</div>
<!-- /비주얼 영역 -->

<div class="container py-5">
    <div class="d-between">
        <div>
            <hr>
            <div class="title">공지사항</div>
        </div>
        <?php if(admin()):?>
            <button class="btn-filled" data-toggle="modal" data-target="#write-modal">공지 작성</button>
        <?php endif;?>
    </div>
    <div class="t-head mt-4">
        <div class="cell-10">글 번호</div>
        <div class="cell-60">제목</div>
        <div class="cell-30">작성일</div>
    </div>
    <?php foreach($notices->data as $notice):?>
        <div class="t-row" onclick="location.href='/notices/<?=$notice->id?>'">
            <div class="cell-10"><?=$notice->id?></div>
            <div class="cell-60"><?= enc($notice->title) ?></div>
            <div class="cell-30"><?= $notice->created_at ?></div>
        </div>
    <?php endforeach;?>
    <div class="mt-4">
        <div class="d-flex justify-content-center">
            <a href="/notices?page=<?=$notices->prevPage?>" class="icon text-yellow" <?=$notices->prev ? 'disabled': ''?>><i class="fa fa-angle-left"></i></a>
            <?php for($i = $notices->start; $i <= $notices->end; $i++):?>
            <a href="/notices?page=<?=$i?>" class="icon bg-yellow text-white"><?=$i?></a>
            <?php endfor;?>
            <a href="/notices?page=<?=$notices->nextPage?>" class="icon text-yellow" <?=$notices->next ? 'disabled': ''?>><i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</div>

<form id="write-modal" class="modal fade" enctype="multipart/form-data" action="/insert/notices" method="post">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="fx-4">작성하기</div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>제목</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label>내용</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>첨부 파일</label>
                    <input type="file" id="files" name="files[]" class="form-control" multiple>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button class="btn-filled">작성 완료</button>
            </div>
        </div>
    </div>
</form>