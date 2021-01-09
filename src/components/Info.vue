<template>
  <div class="rightMain">
    <el-form
      :model="loginForm"
      :rules="rules"
      ref="loginFormRef"
      label-width="80px"
    >
      <div><el-form-item label="账号:" prop="username"></el-form-item></div>

      <div>
        <el-form-item label="昵称:" prop="name">
          <el-input v-model="loginForm.username"></el-input>
        </el-form-item>
      </div>

      <div>
        <el-form-item label="性别:" prop="gender">
          <el-radio v-model="loginForm.radio" label="男">男</el-radio>
          <el-radio v-model="loginForm.radio" label="女">女</el-radio>
        </el-form-item>
      </div>

      <div>
        <el-form-item label="联系电话:" prop="phone">
          <el-input v-model="loginForm.phone"></el-input>
        </el-form-item>
      </div>

      <div>
        <el-form-item>
          <el-button @click="sumbit">登陆</el-button>
        </el-form-item>
      </div>
    </el-form>
  </div>
</template>

<script>
export default {
  name: "Info",
  data() {
    return {
      loginForm: {
        name: "",
        username: "",
        password: "",
        radio: "男",
        phone: "",
      },
    };
  },
};
</script>

<style lang="less" scoped>
.rightMain {
  margin: auto;
  padding-top: 10px;
  overflow: hidden;
  padding-left: 20px;
}

.rightMain span {
  font-size: 14px;
  color: #606266;
}
</style>
