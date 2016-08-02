<div class="information">
    <div class="left">
        <ul>
            <li><div class="list"><div class="triangle"></div><a href=".././about_us/index" >&nbsp;&nbsp;关于青西大宗</a></div></li>
            <li><div class="list "><div class="triangle"></div><a href=".././about_us/law">&nbsp;&nbsp;法律声明</a></div></li>
            <li><div class="list"><div class="triangle"></div><a href=".././about_us/contact" style="color:#035AB7 ">&nbsp;&nbsp;联系我们</a></div></li>
            <li><div class="list"><div class="triangle"></div><a href=".././about_us/recruit">&nbsp;&nbsp;诚聘英才</a></div></li>
        </ul>
    </div>
    <div class="right">
        <div class="top">当前位置 : 首页 > 关于我们 > <?php echo "联系我们" ?></div>
        <div class="map">
            <div style="width:845px;height:430px;border:#ccc solid 1px;font-size:12px" id="map"></div>
        </div>
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=mMg5kHuKKXZ8rBe7r46o8Gf6pe1O9izw"></script>
        <script type="text/javascript">
            //创建和初始化地图函数：
            function initMap() {
                createMap();//创建地图
                setMapEvent();//设置地图事件
                addMapControl();//向地图添加控件
                addMapOverlay();//向地图添加覆盖物
            }
            function createMap() {
                map = new BMap.Map("map");
                map.centerAndZoom(new BMap.Point(120.191884, 35.959182), 15);
            }
            function setMapEvent() {
                map.enableScrollWheelZoom();
                map.enableKeyboard();
                map.enableDragging();
                map.enableDoubleClickZoom();
            }
            function addClickHandler(target, window) {
                target.addEventListener("click", function () {
                    target.openInfoWindow(window);
                });
            }
            function addMapOverlay() {
                var markers = [
                    {content: "地址：青岛市黄岛新区长江中路517号A座</br>电话：400-6733-588", title: "青西大宗商品交易中心", isOpen: 1, imageOffset: {width: 0, height: -21}, position: {lat: 35.959182, lng: 120.191884}}
                ];
                for (var index = 0; index < markers.length; index++) {
                    var point = new BMap.Point(markers[index].position.lng, markers[index].position.lat);
                    var marker = new BMap.Marker(point, {icon: new BMap.Icon("http://api.map.baidu.com/lbsapi/createmap/images/icon.png", new BMap.Size(20, 25), {
                            imageOffset: new BMap.Size(markers[index].imageOffset.width, markers[index].imageOffset.height)
                        })});
                    var label = new BMap.Label(markers[index].title, {offset: new BMap.Size(25, 5)});
                    var opts = {
                        width: 200,
                        title: markers[index].title,
                        enableMessage: false
                    };
                    var infoWindow = new BMap.InfoWindow(markers[index].content, opts);
                    marker.setLabel(label);
                    addClickHandler(marker, infoWindow);
                    map.addOverlay(marker);
                }
                ;
            }
            //向地图添加控件
            function addMapControl() {
                var scaleControl = new BMap.ScaleControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT});
                scaleControl.setUnit(BMAP_UNIT_IMPERIAL);
                map.addControl(scaleControl);
                var navControl = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_LEFT, type: BMAP_NAVIGATION_CONTROL_LARGE});
                map.addControl(navControl);
            }
            var map;
            initMap();
        </script>
        <div class="bottom_information">
            <div class="left">
                <ul>
                    <li class="add">青岛市黄岛新区长江中路517号A座</li>
                    <li class="telephone">服务热线：400-6733-588</li>
                    <li class="email">邮箱地址：info@qcecn.com</li>
                    <li class="web">官网网址：http://www.qcecn.com</li>
                </ul>
            </div>
            <div class="right">
                
            </div>
        </div>
    </div>
</div>