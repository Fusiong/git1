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
      <router-link to="home">
        <img src="./assets/Steam.png" class="topimg" alt="" />
      </router-link>
      <el-form :model="searchForm" ref="searchFormmRef" label-width="55px">
        <div class="searchFrame">
          <el-autocomplete
            class="autowidth"
            placeholder="书名、作者、出版社、ISBN"
            v-model="state"
            :fetch-suggestions="querySearchAsync"
            @select="handleSelect"
          >
            <el-button
              type="primary"
              slot="append"
              icon="el-icon-search"
              @click="searchpage(state)"
            ></el-button>
          </el-autocomplete>
        </div>

        <div class="remind">
          <router-link to="goshopping">
            <i class="el-icon-shopping-cart-2"></i>
            <span>你的购物车</span>
          </router-link>
        </div>
      </el-form>
    </div>

    <div class="alldiv">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: "app",
  data() {
    return {
      searchForm: {},
      state: "",
      hrefs: "login",
      sessionuser: "请登录",
      register: "true",
      allbook: [],
    };
  },
  mounted() {
    let username = sessionStorage.getItem("userName");
    if (username == "" || username == null) {
    } else {
      this.sessionuser = username;
      this.register = false;
      this.hrefs = "userInfo";
    }
    const that = this;

    this.$axios
      .post("http://localhost/Vue/vue05/public/selectbook.php")
      .then((response) => {
        if (response.data != "") {
          let i = 0;

          for (let items of response.data) {
            let item = { value: items.图书标题 };
            that.allbook.push(item);
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
      this.hrefs = "login";
      sessionStorage.setItem("userName", "");
    },
    querySearchAsync(queryString, cb) {
      let allbook = this.allbook;
      let results = queryString
        ? allbook.filter(this.createStateFilter(queryString))
        : allbook;
      cb(results);
    },

    createStateFilter(queryString) {
      return (state) => {
        return (
          state.value.toLowerCase().indexOf(queryString.toLowerCase()) != -1
        );
      };
    },

    handleSelect(item) {
      console.log(item.value);
    },
    searchpage(state) {
      const { href } = this.$router.resolve({
        path: "/detailpage",
        query: { id: state },
      });
      window.open(href, "_blank");
    }
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

.topimg {
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
</style>
