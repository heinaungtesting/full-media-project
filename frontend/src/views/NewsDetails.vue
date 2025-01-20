<template>
  <nav class="d-flexnavbar navbar-expand-lg navbar-light bg-info">
    <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" @click="homePage()"
            >Home <span class="sr-only">(current)</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" @click="loginPage()" v-if="userStatus==false">Login</a>
          <a class="nav-link" @click="logout()" v-if="userStatus==true">Logout</a>

        </li>
      </ul>
    </div>
  </nav>

  <div>
    <main>
      <div class="row">
        <div class="col-lg-8">
          <div class="form-group">
            <button @click="back()" class="button button-contactForm boxed-btn">
              <i class="fa fa-arrow-left"></i>back
            </button>
          </div>
        </div>
      </div>
      <!-- About US Start -->
      <div class="about-area">
        <div class="container">
          <!-- Hot Aimated News Tittle-->
          <div class="row">
            <div class="col-lg-12">
              <div class="trending-tittle">
                <strong>Trending now</strong>
                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                <div class="trending-animated">
                  <ul id="js-news" class="js-hidden">
                    <li class="news-item">
                      Bangladesh dolor sit amet, consectetur adipisicing elit.
                    </li>
                    <li class="news-item">
                      Spondon IT sit amet, consectetur.......
                    </li>
                    <li class="news-item">
                      Rem ipsum dolor sit amet, consectetur adipisicing elit.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <!-- Trending Tittle -->
              <div class="about-right mb-90">
                <div class="about-img">
                  <img :src="posts.image" alt="" />
                </div>
                <div class="section-tittle mb-30 pt-30">
                  <h3>{{ posts.title }}</h3>
                </div>
                <div class="about-prea">
                  <p class="about-pera1 mb-25">{{ posts.description }}</p>
                </div>
                <div class="social-share pt-30">
                    <div class="row g-1 flex-column shadow-xl">
                    <h2>Comment</h2>
                    <div class="d-flex mb-3 " v-for="item in message" :key="item.id">
                      <div class="">
                      <p class="" style="font-size: 14px;">
                        {{ new Date(item.created_at).toLocaleString() }}
                      </p>
                      <div class="d-flex justify-content-between">
                        <h5>{{ item.user_name }}</h5>
                        
                      </div>
                      <p>{{ item.comment }}</p>
                      </div>
                      
                    </div>
                    </div>

                 <div class="" v-if="userStatus==true"> <div class="col-lg-12">
                    <div class="border-bottom rounded">
                      <textarea
                        name="comment"
                        id=""
                        class="form-control border-0 shadow"
                        cols="30"
                        rows="8"
                        placeholder="Your Review *"
                        spellcheck="false"
                        v-model="comment"
                      ></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="d-flex justify-content-between py-3 mb-5" >
                      <button @click="setComment()"
                       
                        class="btn border border-secondary text-primary rounded-pill px-4 py-3"
                      >
                        <i class="fa fa-shopping-bag text-bg-primary"></i> Post
                        Comment
                      </button>
                    </div>
                    </div>
                </div>
                <div class="" v-if="userStatus==false"><h3 class="text-danger text-center">You need to Log in </h3></div>
                  </div>
                <div class="section-tittle">
                  <div class="d-flex">
                    <img
                      class="img-fluid rounded-circle p-3"
                      style="width: 100px; height: 100px"
                      alt=""
                    />
                    <div class="">
                      <div class="d-flex justify-content-between">
                        <h5></h5>
                      </div>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- From -->
            </div>
            <div class="col-lg-4">
              <!-- Section Tittle -->
              <div class="section-tittle mb-40">
                <h3>Follow Us</h3>
              </div>
              <!-- Flow Socail -->

              <!-- New Poster -->
              <div class="news-poster d-none d-lg-block">
                <img src="assets/img/news/news_card.jpg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- About US End -->
    </main>
  </div>
</template>

<script src="../js/newdetail.js"></script>