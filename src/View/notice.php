<!-- 비주얼 영역 -->
<div class="visual visual--sub">
    <div class="background background--black">
        <img src="/images/visual/sub.jpg" alt="비주얼 이미지" title="비주얼 이미지">
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
    <div class="fx-4"><?= enc($notice->title) ?></div>
    <div class="fx-n2 text-muted mt-3"><?= $notice->created_at ?></div>
    <div class="mt-3 fx-n1 text-muted">
        <?= enc($notice->content) ?>
    </div>
    <div class="row mt-5">
        <?php foreach($notice->files as $file):?>
            <?php if(array_search(extname($file), [".jpg", ".jpeg", ".png", ".gif"]) !== false):?>
                <div class="col-lg-4">
                    <img src="/images/notices/<?=$file?>" alt="파일 이미지" class="fit-cover">
                </div>
            <?php endif;?>
        <?php endforeach;?>
    </div>
    <div class="mt-4">
        <?php foreach($notice->files as $file):?>
            <div class="py-2">
                <div class="mb-3">
                    <span class="fx-1"><?= substr($file, strpos($file, "-") + 1) ?></span>
                    <span class="fx-n1">(<?= number_format(filesize(UPLOAD."/$file") / 1024, 2) ?>KB)</span>
                </div>
                <a href="/download/<?=$file?>" class="btn-filled">다운로드</a>
            </div>
        <?php endforeach;?>
    </div>
    <?php if(admin()):?>
    <div class="mt-4">
        <button class="btn-filled" data-toggle="modal" data-target="#edit-modal">수정하기</button>
        <a href="/delete/notices/<?=$notice->id?>" class="btn-bordered">삭제하기</a>
    </div>
    <?php endif;?>
</div>

<form id="edit-modal" class="modal fade" action="/update/notices/<?=$notice->id?>" method="post" enctype="multipart/form-data">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <div class="fx-4">수정하기</div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>제목</label>
                    <input type="text" class="form-control" name="title" value="<?=$notice->title?>" required>
                </div>
                <div class="form-group">
                    <label>내용</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" required><?=$notice->content?></textarea>
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