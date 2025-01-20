<template>
  <div>
    <nav class="d-flexnavbar navbar-expand-lg navbar-light bg-info">
      <div
        class="collapse navbar-collapse justify-content-around"
        id="navbarNav"
      >
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" @click="homePage()"
              >ホーム <span class="sr-only">(現在)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="loginPage()">ログイン</a>
          </li>
        </ul>
            </div>
          </nav>
          <div class="container col-5 shadow-sm my-5 p-5">
            
        <div class="alert alert-danger" v-if="userstatus==true">メールアドレスまたはパスワードが正しくありません</div>
        <div class="form-group">
          <label for="exampleInputEmail1">メールアドレス</label>
          <input
          required
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="メールアドレスを入力"
            v-model="userdata.email"
          />
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">パスワード</label>
          <input
          required
            type="password"
            class="form-control"
            id="exampleInputPassword1"
            placeholder="パスワード"
            v-model="userdata.password"
          />
        </div>
            
        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-primary" @click="login()">送信</button>
          <a  class=" h4" @click="registerPage()">登録</a>
        </div>

        
    </div>
  </div>
</template>

<script src="../js/login.js"></script>
