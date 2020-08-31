    <!-- 비주얼 영역 -->
    <div class="visual visual--sub">
        <div class="background background--black">
            <img src="/images/visual/sub.jpg" alt="비주얼 이미지" title="비주얼 이미지">
        </div>
        <div class="visual__content container">
            <div class="text-center">
                <div class="fx-3 text-gray">전주한지문화축제</div>
                <div class="fx-7 text-white">로그인</div>
            </div>
        </div>
    </div>
    <!-- /비주얼 영역 -->
    
    <form id="sign-up" method="post" enctype="multipart/form-data">
        <div class="container py-5">
            <div class="form-group">
                <label>아이디</label>
                <input type="text" class="form-control" id="user_email" name="user_email">
                <div class="error text-red fx-n2"></div>
            </div>
            <div class="form-group">
                <label>비밀번호</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="error text-red fx-n2"></div>
            </div>
            <div class="form-group text-right">
                <button class="btn-filled">로그인</button>
            </div>
        </div>
    </form>
