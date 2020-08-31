    <!-- 비주얼 영역 -->
    <div class="visual visual--sub">
        <div class="background background--black">
            <img src="/images/visual/sub.jpg" alt="비주얼 이미지" title="비주얼 이미지">
        </div>
        <div class="visual__content container">
            <div class="text-center">
                <div class="fx-3 text-gray">전주한지문화축제</div>
                <div class="fx-7 text-white">회원가입</div>
            </div>
        </div>
    </div>
    <!-- /비주얼 영역 -->
    
    <form id="sign-up" method="post" enctype="multipart/form-data">
        <div class="container py-5">
            <div class="form-group">
                <label>이메일</label>
                <input type="email" class="form-control" id="user_email" name="user_email">
                <div class="error text-red fx-n2"></div>
            </div>
            <div class="form-group">
                <label>비밀번호</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="error text-red fx-n2"></div>
            </div>
            <div class="form-group">
                <label>비밀번호 확인</label>
                <input type="password" class="form-control" id="passconf" name="passconf">
                <div class="error text-red fx-n2"></div>
            </div>
            <div class="form-group">
                <label>프로필 사진</label>
                <input type="file" class="form-control" id="image" name="image">
                <div class="error text-red fx-n2"></div>
            </div>
            <div class="form-group">
                <label>이름</label>
                <input type="text" class="form-control" id="user_name" name="user_name">
                <div class="error text-red fx-n2"></div>
            </div>
            <div class="form-group">
                <label>회원 유형</label>
                <select id="user_type" name="user_type" class="form-control">
                    <option value="normal">일반 회원</option>
                    <option value="company">기업 회원</option>
                </select>
                <div class="error text-red fx-n2"></div>
            </div>
            <div class="form-group text-right">
                <button class="btn-filled">회원가입</button>
            </div>
        </div>
    </form>
    <script src="/js/sign-up.js"></script>