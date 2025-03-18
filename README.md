# Genius Revolve 3 Theme for Typecho    
# 天才革新3主题(Typecho)

适用于Typecho1.2的主题，永久免费，求star

Typecho安装：typecho.org

## 主题安装方式

在Typecho安装路径/usr/themes/下新建目录，命名随意，把仓库内容复制来

或者直接在Typecho安装路径/usr/themes/下用git clone本项目。

登录管理面版，控制台>主题下能看到☝️🤓就是正常识别了。按照指示点击对应启用按钮即可。主题部分设置项可能不会有作用，还在改。

## 关于头像

头像源需要替换 Gravatar 头像为 Cravatar 头像，要不然卡的你怀疑人生。

你需要把以下内容：

```php
define('__TYPECHO_GRAVATAR_PREFIX__', 'https://cravatar.cn/avatar/');
```

写到安装位置的config.inc.php里面

# 问题反馈

要反馈问题，你只需要提供出问题的元素和问题状况和环境信息，例如：

> div.container 宽度不正常 使用typecho1.2&php8.2+edge Android114.51

或者

> 夜间模式 没有作用 使用typecho1.2&php8.2+xbet(x浏览器) Android114.51

（如果有截图就更好了）