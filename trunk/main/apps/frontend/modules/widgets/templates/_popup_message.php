<a href="javascript:void(0)" rel="#popup-global-message" class="popup-global-message-btn" style="display: none;"></a>
<div class="popup_wrapper" id="popup-global-message">
    <div class="popup" >
        <div id="popup_content">
            <div class="popup_title"><img src="/images/common/mini_logo.png"></div>
            <div class="popup_global_message_content">
                <div class="text">
                    
                </div>
                <div class="popup-btn">
                    <input type="button" class="cancle-btn btn" value="关 闭"/>
                </div>
            </div>
        </div>
        <a href="javascript:void(0)" class="close"></a>
    </div>
</div>

<script>
    $(function() {
        $(".popup-global-message-btn").overlay({
            // custom top position 
            top: '25%',
            fixed: true,
            // some expose tweaks suitable for modal dialogs
            expose: {
                color: '#000',
                loadSpeed: 200,
                opacity: 0.5,
                onLoad: function focusMe() {
                    
                },
                onClose: function focusMe() {
                    
                }
            },
            closeOnClick: false
        });

        $("#popup-global-message .cancle-btn").click(function() {
            $("#popup-global-message .close").trigger("click");
        });
    });
</script>