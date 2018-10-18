-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 06 月 28 日 16:05
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `admin`
--

-- --------------------------------------------------------

--
-- 表的结构 `admintable`
--

CREATE TABLE IF NOT EXISTS `admintable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(5) NOT NULL,
  `password` char(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admintable`
--

INSERT INTO `admintable` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgsrc` varchar(50) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` varchar(300) NOT NULL,
  `allcontent` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `imgsrc`, `title`, `content`, `allcontent`) VALUES
(5, 'img/li.png', 'iponeX屏幕适配', 'iPhoneX 取消了物理按键，改成底部小黑条，这一改动导致网页出现了比较尴尬的屏幕适配问题。\r\n', 'iPhoneX 取消了物理按键，改成底部小黑条，这一改动导致网页出现了比较尴尬的屏幕适配问题。</br>\r\n对于网页而言，顶部（刘海部位）的适配问题浏览器已经做了处理，所以我们只需要关注底部与</br>\r\n小黑条的适配问题即可（即常见的吸底导航、返回顶部等各种相对底部 fixed 定位的元素）。</br>\r\n\r\n笔者通过查阅了一些官方文档，以及结合实际项目中的一些处理经验，整理了一套简单的适配</br>\r\n方案分享给大家，希望对大家有所帮助</br>\r\n屏幕适配问题</br>\r\nenv() 和 constant()</br>\r\n\r\niOS11 新增特性，Webkit 的一个 CSS 函数，用于设定安全区域与边界的距离，有四个预定义的变量：</br>\r\n\r\nsafe-area-inset-left：安全区域距离左边边界距离</br>\r\nsafe-area-inset-right：安全区域距离右边边界距离</br>\r\nsafe-area-inset-top：安全区域距离顶部边界距离</br>\r\nsafe-area-inset-bottom：安全区域距离底部边界距离</br>\r\n这里我们只需要关注 safe-area-inset-bottom 这个变量，因为它对应的就是小黑条的高度（横竖屏时值不一样）。</br>\r\n第一步：设置网页在可视窗口的布局方式</br>\r\n\r\n新增 viweport-fit 属性，使得页面内容完全覆盖整个窗口：</br>\r\n\r\n<meta name="viewport" content="width=device-width, viewport-fit=cover"></br>\r\n前面也有提到过，只有设置了 viewport-fit=cover，才能使用 env()。</br>\r\n\r\n第二步：页面主体内容限定在安全区域内</br>\r\n\r\n这一步根据实际页面场景选择，如果不设置这个值，可能存在小黑条遮挡页面最底部内容的情况。</br>\r\n\r\n\r\nbody {</br>\r\n  padding-bottom: constant(safe-area-inset-bottom);</br>\r\n  padding-bottom: env(safe-area-inset-bottom);</br>\r\n}</br>\r\n'),
(2, 'img/three.png', 'ThreeJs', '乱七八糟地整理了自己最近学 Three.js 的相关知识，其中难免出现一些自己理解不透彻，甚至是错误的观点', '随着 WebGL 标准的快速推进，越来越多团队尝试在浏览器上推出可交互的 3D 作品。相较于二维场景，它更能为用户带来真实和沉浸的体验。</br>\r\n\r\n然而 OpenGL 和 WebGL（基于 OpenGL ES） 都比较复杂，Three.js 则更适合初学者。本文将分享一些 Three.js 的基础知识，希望能让你能有所收获。</br>\r\n\r\n当然，分享的知识点也不会面面俱到，想更深入的学习，还得靠大家多看多实践。另外，为了控制篇幅，本文更倾向于通过案例中的代码和注释进行阐述一些细节。</br>\r\n\r\n若想系统学习，笔者认为看书是一个不错的选择：</br>'),
(3, 'img/jstable.png', 'js创建一条通用链表', '为了突显「链表性」笔者添加了四个 insert*。insert* 的作用是向主链表指定位置插入节点或链表', '随着 WebGL 标准的快速推进，越来越多团队尝试在浏览器上推出可交互的 3D 作品。相较于二维场景，它更能为用户带来真实和沉浸的体验。</br>\n\n然而 OpenGL 和 WebGL（基于 OpenGL ES） 都比较复杂，Three.js 则更适合初学者。本文将分享一些 Three.js 的基础知识，希望能让你能有所收获。</br>\n\n当然，分享的知识点也不会面面俱到，想更深入的学习，还得靠大家多看多实践。另外，为了控制篇幅，本文更倾向于通过案例中的代码和注释进行阐述一些细节。</br>\n\n若想系统学习，笔者认为看书是一个不错的选择：</br>'),
(4, 'img/urls.png', 'URL编码的奥秘', '了解了encodeURI的不编码集合的由来，再来看看encodeURI与encodeURIComponent的区别。', '共同点：</br>\n对于需要编码的ASCII字符，将其表示为两个16进制的数字，然后在其前面放置转义字符(%)，置入URI中的相</br>应位置。</br>\n区别：</br>\n标准：对于非ASCII字符, 需要转换为UTF-8字节序, 然后每个字节按照上述方式表示。</br>\n非标准：对于非ASCII字符在URI中表示为: %uxxxx, 其中xxxx是用4个十六进制数字表示的Unicode的码位</br>值。\n因为凹凸不是ASCII字符，所以encodeURI 对 凹凸 先转换为UTF-8字节序，一个字符有三个字节，每个字节</br>转化为%xx，所以最后有6个%xx。</br>\nescape直接对凹凸转成了%u51F9%u51F8。</br>'),
(12, 'img/urls.png', 'HELLO BOY!!', 'HELLO BOY!!', 'HELLO BOY!!'),
(13, 'img/bann.png', 'test', 'test', 'test'),
(10, 'img/page.png', 'dd', 'd', 'd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
