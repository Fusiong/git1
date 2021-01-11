<template>
  <div class="rightMain">
    <el-form
      :model="loginForm"
      :rules="rules"
      ref="loginFormRef"
      label-width="100px"
    >
      <div>
        <el-form-item label="旧密码:" prop="oldpass">
          <el-input v-model="loginForm.oldpass" type="password"></el-input>
        </el-form-item>
      </div>

      <div>
        <el-form-item label="新密码:" prop="newpass">
          <el-input v-model="loginForm.newpass" type="password"></el-input>
        </el-form-item>
      </div>

      <div>
        <el-form-item label="重复新密码:" prop="repepass">
          <el-input v-model="loginForm.repepass" type="password"></el-input>
        </el-form-item>
      </div>

      <div>
        <el-form-item>
          <el-button @click="sumbit">修改密码</el-button>
        </el-form-item>
      </div>
    </el-form>
  </div>
</template>

<script>
export default {
  name: "pass",
  data() {
    return {
      loginForm: {
        oldpass: "",
        newpass: "",
        repepass: "",
      },
      rules: {
        oldpass: [
          { required: true, message: "请输入密码", trigger: "blur" },
          {
            min: 6,
            max: 15,
            message: "长度在 6 到 15 个字符",
            trigger: "blur",
          },
        ],
        newpass: [
          { required: true, message: "请输入密码", trigger: "blur" },
          {
            min: 6,
            max: 15,
            message: "长度在 6 到 15 个字符",
            trigger: "blur",
          },
        ],

        repepass: [
          { required: true, message: "请输入密码", trigger: "blur" },
          {
            min: 6,
            max: 15,
            message: "长度在 6 到 15 个字符",
            trigger: "blur",
          },
        ],
      },
    };
  },
  mounted() {
    let username = sessionStorage.getItem("userName");
    if (username == "" || username == null) {
      window.location.href = "home";
    }
  },

  methods: {
    sumbit() {
      let username = sessionStorage.getItem("userName");
      let account = sessionStorage.getItem("account");
      if (username == "" || username == null) {
        window.location.href = "home";
      } else if (this.loginForm.newpass != this.loginForm.repepass) {
        alert(username + ",你输入两次新密码不一样");
      } else {
        this.$refs.loginFormRef.validate((valid) => {
          if (valid) {
            let data = new FormData();
            data.append("oldpass", this.loginForm.oldpass);
            data.append("newpass", this.loginForm.newpass);
            data.append("username", account);

            this.$axios
              .post("http://localhost/Vue/vue05/public/pass.php", data)
              .then((response) => {
                alert("修改密码成功," + username);
              });
          }
        });
      }
    },
  },
};
</script>


<style lang="less" scoped>
.rightMain {
  float: left;
  padding-top: 10px;
  overflow: hidden;
  padding-left: 50px;
  width: 300px;
}
</style>
