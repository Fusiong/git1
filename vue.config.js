module.exports = {
        pages: {
          index: {
            entry: 'src/main.js',
            template: 'public/index.html',
            filename: 'index.html'
          },
          login: {
              entry:'src/login.js',
              template:'public/login.html',
              filename:'login.html'
          },
          userInfo:{
            entry:'src/userInfo.js',
            template:'public/userInfo.html',
            filename:'userInfo.html'
          },
        }
      }