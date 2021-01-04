<template>
  <div id="app">
    <el-row>
      <el-col>
        <div class="topBar">
          <i class="el-icon-setting"></i>
          <span>你好,欢迎光临二手书买卖商城</span>

          <ul class="topBar">
            <li><a href="login">请登录</a></li>
            <li>免费注册</li>
            <li>我的订单</li>
            <li>联系客服</li>
          </ul>
        </div>
      </el-col>
    </el-row>

    <div class="searchdiv">
      <img src="@/assets/Steam.png" alt="" />
      <el-form
        :model="searchForm"
        :rules="rules"
        ref="searchFormmRef"
        label-width="55px"
      >
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

    <router-view></router-view>
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
    };
  },
};
</script>

<style lang="less">
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
</style>
