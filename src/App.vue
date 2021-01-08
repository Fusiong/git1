<template>
  <div id="app">
    <el-row>
      <el-col>
        <div class="topBar">
          <i class="el-icon-setting"></i>
          <span>你好,欢迎光临二手书买卖商城</span>

          <ul class="topBar">
            <li>
              <a :href="hrefs">{{ sessionuser }}</a>
            </li>
            
            <li v-if="register">
              <a href="/login#/register">免费注册</a>
            </li>

            <button v-else @click="exit">[退出]</button>

            <li>我的订单</li>
            <li>联系客服</li>
          </ul>
        </div>
      </el-col>
    </el-row>

    <div class="searchdiv">
      <img src="./assets/Steam.png" alt="" />
      <el-form :model="searchForm" ref="searchFormmRef" label-width="55px">
        <div class="searchFrame">
          <el-autocomplete
            class="autowidth"
            placeholder="书名、作者、出版社、ISBN"
            v-model="searchForm.key"
          >
            <el-button
              type="primary"
              slot="append"
              icon="el-icon-search"
            ></el-button>
          </el-autocomplete>
        </div>

        <div class="remind">
          <i class="el-icon-shopping-cart-2"></i>
          <span>你的购物车0本</span>
        </div>
      </el-form>
    </div>

    <div class="leftdiv">
      <ul v-for="(item, index) in classfity" :key="index">
        <h3 v-show="index == 0">{{ item }}</h3>
        <h3 v-show="index == 1">{{ item }}</h3>
        <h3 v-show="index == 2">{{ item }}</h3>
        <h3 v-show="index == 3">{{ item }}</h3>
        <div class="leftsmalldiv">
          <a
            v-for="items in list.slice(index * 4, (index + 1) * 4)"
            :key="items.id"
          >
            {{ items.title }}
          </a>
        </div>
      </ul>
    </div>
    <div class="middelediv">
      <router-view name="top"></router-view>
    </div>

    <div class="rightdiv">
      <div class="righttitle"></div>
      <div class="rightuldiv">
        <ul>
          <li v-for="(item, index) in sortlist" :key="index">
            <div class="righthoveron" >

              <div >
              <span class="rightspan">{{ index + 1 }}</span>
              <div class="pic" >
                <img
                  :src="item.src"
                  class="img"
                />
                <p class="righttitle">{{item.title}}</p>
                <p class="rightprice">￥{{item.price}}</p>
              </div>
              </div>
              
         


            </div>

              
              
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "app",
  data() {
    return {
      searchForm: {
        key: "",
      },
      hrefs: "login",
      sessionuser: "请登录",
      register: "true",
      classfity: ["名人名著", "悬疑解密", "青春恋爱", "散文小说"],
      list: [
        { id: 1, title: "巴黎圣母院" },
        { id: 2, title: "海底两万里" },
        { id: 3, title: "追风筝的人" },
        { id: 4, title: "百万英镑" },
        { id: 5, title: "白色病毒" },
        { id: 6, title: "嫌疑人X的献身" },
        { id: 7, title: "岛" },
        { id: 8, title: "暗杀大师：秘密仆人" },
        { id: 9, title: "夏目友人帐" },
        { id: 10, title: "IQ265恋人搜查官" },
        { id: 11, title: "安东侯府" },
        { id: 12, title: "爱你是最好的时光" },
        { id: 13, title: "2018中国年度短篇小说" },
        { id: 14, title: "2018中国散文诗年选" },
        { id: 15, title: "欧·亨利短篇小说精选" },
        { id: 16, title: "2018诗歌年选" },
      ],
      sortlist: [
        {
          title: "标题",
          price: 20.0,
          src: require("./img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("./img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("./img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("./img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("./img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("./img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("./img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("./img/a.jpg"),
        },
      ],
    };
  },
  mounted() {

    let username = sessionStorage.getItem("userName");
    
    if (username == ""||username==null) {
   
    }else{
      this.sessionuser = username;
      this.register = false;
    }

  
      this.$axios
      .post("http://localhost/Vue/vue05/public/sortlist.php")
      .then((response) => {
        
        if (response.data != "") {
          let i = 0;
          for (let item of this.sortlist) {
            item.title = response.data[i].图书标题;
            item.price = response.data[i].价格;
            item.src = require("./img/" + response.data[i].图书标题 + ".jpg");

            i++;
          }
        } else {
          return;
        }
      });
  


  },
  methods: {
    exit() {
      this.register = true;
      this.sessionuser = "请登录";
      sessionStorage.setItem("userName","");
    },
  },
};
</script>

<style lang="less" scope>
.el-row {
  margin-bottom: 20px;
  &:last-child {
    margin-bottom: 0;
  }
}
.el-col {
  border-radius: 4px;
}

.topBar {
  margin: 0px;
  border-radius: 4px;
  height: 36px;
  padding-left: 10px;
  line-height: 36px;
  background: #e5e9f2;
}

.el-icon-setting {
  margin-left: 40px;
}

span {
  padding-left: 10px;
}

.topBar ul {
  float: right;
  margin-right: 20px;
}

img {
  width: 320px;
  height: 140px;
  float: left;
}

.topBar li {
  display: inline;
  margin-right: 20px;
  float: left;
}

.searchdiv {
  width: 1400px;
  margin: 0 auto;
  clear: both;
  height: 140px;
  padding-top: 10px;
}

.searchFrame {
  float: left;
  margin-top: 45px;
  margin-left: 130px;
  overflow: hidden;
}

.autowidth {
  width: 400px;
}

button {
  cursor: pointer;
}

.remind {
  float: right;
  margin-top: 45px;
  margin-right: 100px;
  overflow: hidden;
}

a {
  text-decoration: none;
}

.leftdiv {
  border: 1px solid rgb(220, 220, 220);
  float: left;
  width: 208px;
  margin-top: 30px;
  margin-left: 60px;
}

.leftdiv ul {
  display: inline-block;
  margin-left: -30px;
  margin-top: -10px;
}

.leftdiv a {
  color: #696969;
  display: inline-block;
  margin-right: 10px;
  height: 20px;
}
.middelediv {
  float: left;
  margin-left: 50px;
}

.rightdiv {
  background-color: rgb(249, 249, 249);
  float: right;
  margin-right: 100px;
}

.rightuldiv {
  text-align: left;
  border: 1px solid #ccc;
}

.rightuldiv ul li {
  margin-left: -30px;
}

.rightspan {
  font-size: 16px;
  color: red;
  text-align: right;
  float: left;
}

.pic {
  width: 180px;
 height: 50px;
  margin-left: 30px;
  margin-bottom: 10px;
}

.righttitle {
  width: 115px;
  margin-left: 10px;
  margin-top: 0px;
  float: left;
  font-size: 14px;
}

.rightprice {
  width: 100px;
  margin-left: 10px;
  margin-top: 0px;
  float: left;
  font-size: 14px;
  display:none;
  color: red;
}

.righthoveron :hover img{
  display: block;
}


.righthoveron :hover .rightprice{
   display: inline-block;
}

.righthoveron :hover .pic{
   height: 80px;
}

.img{
   height: 80px; 
   width: 54px; 
   display:none;
}


</style>
