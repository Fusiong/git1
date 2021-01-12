<template>
  <div>
    <div class="header">
      <div class="account">
        已有账号？
        <router-link to="/login">
          <a class="login">请登录</a>
        </router-link>

        <a href="Home">
          <el-button type="primary" icon="el-icon-house" circle></el-button>
        </a>
        
      </div>

      <div class="imgdiv">
        <img src="../assets/Steamr.png" alt="" />
      </div>
    </div>

    <div class="container">
      <el-form
        :model="loginForm"
        :rules="rules"
        ref="loginFormRef"
        label-width="55px"
      >
        <el-form-item
          label="请输入你的账号:"
          label-width="140px"
          prop="username"
        >
          <el-input
            v-model="loginForm.username"
            prefix-icon="el-icon-user"
            placeholder="账号"
          >
          </el-input>
        </el-form-item>

        <el-form-item
          label="请输入你的密码:"
          label-width="140px"
          prop="password"
        >
          <el-input
            v-model="loginForm.password"
            prefix-icon="el-icon-lock"
            placeholder="密码"
            type="password"
          >
          </el-input>
        </el-form-item>
        <el-form-item label="请输入你的昵称:" label-width="140px" prop="name">
          <el-input
            v-model="loginForm.name"
            prefix-icon="el-icon-user-solid"
            placeholder="昵称"
          >
          </el-input>
        </el-form-item>

        <el-form-item label-width="240px" style="margin-top: 30px">
          <router-link to="/register">
            <el-button class="rightbtns" type="warning" @click="reg"
              >注册</el-button
            >
          </router-link>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script >
export default {
  name: "register",

  data() {
    let usernamerule = (rule, value, callback) => {
      let data = new FormData();
      data.append("username", value);
      this.$axios
        .post("http://localhost/Vue/vue05/public//registerrule.php", data)
        .then((response) => {
          console.log(response.data);
          if (response.data) {
            this.repe = response.data;
          }
        });

      if (!value) {
        return callback(new Error("账号不能为空"));
      }

      setTimeout(() => {
        if (this.repe) {
          callback(new Error("该用户已注册"));
          this.repe = false;
        } else if (value.length > 11) {
          callback(new Error("长度在 1 到 11 个字符"));
        } else {
          callback();
        }
      }, 1000);
    };

    return {
      loginForm: {
        username: "",
        password: "",
        repe: false,
        name: "",
      },
      rules: {
        username: [
          {
            validator: usernamerule,
            trigger: "blur",
          },
        ],
        password: [
          { required: true, message: "请选择密码", trigger: "blur" },
          {
            min: 6,
            max: 15,
            message: "长度在 6 到 15 个字符",
            trigger: "blur",
          },
        ],
        name: [
          { required: true, message: "请输入昵称", trigger: "blur" },
          {
            min: 2,
            max: 20,
            message: "长度在 2 到 20 个字符",
            trigger: "blur",
          },
        ],
      },
    };
  },
  methods: {
    reg() {
      this.$refs.loginFormRef.validate((valid) => {
        if (valid) {
          let data = new FormData();
          data.append("username", this.loginForm.username);
          data.append("password", this.loginForm.password);
          data.append("name", this.loginForm.name);
          this.$axios
            .post("http://localhost/Vue/vue05/public/regist.php", data)
            .then((response) => {
              alert("恭喜你注册成功," + this.loginForm.name);
              window.location.href = "home";
            });
        }
      });
    },
  },
};
</script>

<style lang="less" scoped>
.header {
  background-color: #e9eef3;
  color: #333;
  text-align: right;
  height: 120px;
  line-height: 160px;
}

.header a {
  margin-right: 50px;
  text-decoration: none;
  color: red;
}

.header a :hover {
  text-decoration: underline;
}

.imgdiv {
  margin-left: 60px;
  margin-top: -140px;
  width: 210px;
  height: 100px;

  img {
    width: 100%;
    height: 100%;
  }
}

.container {
  width: 450px;
  height: 300px;
  background-color: #fff;
  border-radius: 10px;
  position: absolute;
  left: 45%;
  top: 50%;
  transform: translate(-50%, -50%);
  padding: 20px;
  padding-right: 40px;
}
</style>
