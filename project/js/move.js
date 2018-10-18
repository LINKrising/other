/*
	v = s / t;
	obj元素，
	json为变化属性
	timer为执行时间
*/
	function move(obj,json,timer){
				clearInterval(obj.timer);
					obj.timer = setInterval(function(){
					for( var attr in json){
					//console.log(json[attr]);
					var cur = 0;
					cur =parseInt(getComputedStyle(obj)[attr]);
					//console.log(cur);
					var speed = (json[attr] - cur) / 7;
					speed = speed > 0?Math.ceil(speed):Math.floor(speed);
					// console.log(speed);
					obj.style[attr] = cur + speed + "px";
					}
				},timer)
}