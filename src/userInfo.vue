<template>
  <div>
    <el-container
      style="
        height: 600px;
        width: 1000px;
        margin: 0px auto;
        margin-top: 50px;
        border: 1px solid #eee;
      "
    >
      <el-aside width="200px" style="background-color: rgb(238, 241, 246)">
        <el-menu :default-openeds="['1', '2', '3']">
          <el-submenu index="1">
            <template slot="title">
              <i class="el-icon-goods"></i>我的订单
            </template>
            <el-menu-item-group>

              <router-link class="listrouter" to="/myorder">
              <el-menu-item index="1-1">订单确认</el-menu-item>
              </router-link>

            </el-menu-item-group>
          </el-submenu>

          <el-submenu index="2">
            <template slot="title">
              <i class="el-icon-user"></i>个人中心
            </template>
            <el-menu-item-group>
              <router-link
                class="listrouter"
                v-for="(item, index) in menuList"
                :key="index"
                :to="item.path"
              >
                <el-menu-item :index="item.indey">
                  {{ item.name }}
                </el-menu-item>
              </router-link>
            </el-menu-item-group>
          </el-submenu>

          <el-submenu index="3">
            <template slot="title">
              <i class="el-icon-s-home"></i>回到主页
            </template>
            <el-menu-item-group>
              <a href="home" class="listrouter">
                <el-menu-item index="3-1">回到主页</el-menu-item>
              </a>
            </el-menu-item-group>
          </el-submenu>
        </el-menu>
      </el-aside>

      <el-container>
        <el-header style="text-align: right; font-size: 12px">
          <el-dropdown>
            <i class="el-icon-setting" style="margin-right: 15px"></i>
            <el-dropdown-menu slot="dropdown">
              <el-dropdown-item>回到主页</el-dropdown-item>
            </el-dropdown-menu>
          </el-dropdown>
          <span>欢迎回来,{{ username }}</span>
        </el-header>

        <el-main>
          <router-view></router-view>
        </el-main>
      </el-container>
    </el-container>
  </div>
</template>

<script>
export default {
  name: "userInfo",
  data() {
    return {
      username: "",
      menuList: [
        { indey: "2-1", name: "个人基本信息", path: "/Info" },
        { indey: "2-2", name: "个人密码修改", path: "/pass" },
        { indey: "2-3", name: "地址添加", path: "/addresses" },
      ],
    };
  },
  mounted() {
    let username = sessionStorage.getItem("userName");
    this.username = username;
  },
};
</script>

<style lang="less" scope>
.el-header {
  background-color: #b3c0d1;
  color: #333;
  line-height: 60px;
}

.el-aside {
  color: #333;
}
.listrouter {
  text-decoration: none;
}
</style>
