# redis_watch
crontab 适合设置成一个小时执行一次
redis_watch.php 监控的主体程序,每一分钟循环监控一次,出现问题发送邮件,退出程序
				        监控项: 1.redis运行状态 2.内存   3.客户端连接数 
redis_lib.php   配置项和发送邮件等方法
redis_pid.log   php进程号存储文件
