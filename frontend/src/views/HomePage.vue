<template>
  <nav class="d-flexnavbar navbar-expand-lg navbar-light bg-info">
  

  <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" @click="homePage()">ホーム <span class="sr-only">(現在)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" @click="loginPage()" v-if="!tokenStatus">ログイン</a>
        <a class="nav-link" @click="logout()" v-if="tokenStatus">ログアウト</a>
      </li>
        
        </ul>
      </div>
    </nav>
         <!-- 新着情報開始 -->
         <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-3 col-md-3">
                <div class="section-tittle mb-30">
                <h3>新着情報</h3>
                </div>
                </div>
                <div class="col-lg-9 col-md-9">
                <div class="properties__button">
                <!--ナビボタン-->
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"  role="tab" aria-controls="nav-home" aria-selected="true" @click="categorySearch('')">すべて</a
            >
            <a
              class="nav-item nav-link" v-for="(category,index) in categoryLists" :key="index"
              id="nav-profile-tab"
              data-toggle="tab"
              
              role="tab"
              aria-controls="nav-profile"
              aria-selected="false"
              @click="categorySearch(category.id)"
              >{{ category.title }}
            </a>
            
              </div>
            </nav>
            <!--ナビボタン終了-->
          </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
            <div class="d-flex justify-content-end">
            <input type="text" name="" class="col-3 form-control" v-model="searchKey" id="" v-on:keyup.enter="search()">
            <i class="fa-solid fa-magnifying-glass mt-2 ml-3" style="font-size: 25px;" @click="search()"></i>
            </div>
          <!-- ナビカード -->
          <div class="tab-content" id="nav-tabContent">
            <!-- カード1 -->
            <div
              class="tab-pane fade show active"
              id="nav-home"
              role="tabpanel"
              aria-labelledby="nav-home-tab"
            >
              <div class="whats-news-caption">
            <div class="row">
              <div class="mx-auto mt-5 d-flex align-items-center" style="height: 500px;" v-if="postLists.length==0"><h1 class="text-danger">データがありません</h1></div>
              <div class="col-lg-6 col-md-6 " v-for="(post,index) in postLists" :key="index" v-else-if="postLists.length!=0">
                <div class="single-what-news mb-100" @click="NewsDetails(post.id)">
              <div class="what-img">
                <img
                  :src="post.image"
                  alt=""
                />
              </div>
              <div class="what-cap">
                <span class="color1">ナイトパーティー</span>
                <h4>
                  <a href="details.html"
                >{{ post.title }}</a
                  >
                </h4>
              </div>
                </div>
              </div>
            </div>
              </div>
            </div>
           
          </div>
          <!-- ナビカード終了 -->
            </div>
          </div>
        </div>
           </div>
        </div>
        </section>
        
</template>

<script src="../js/homePage.js">
  
</script>

