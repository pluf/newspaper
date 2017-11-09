<?php
Pluf::loadFunction('Newspaper_Shortcuts_GetFollowerListCount');

class Newspaper_Views_Follower
{

    public static function create($request, $match)
    {
        // initial page data
        $form = new Newspaper_Form_FollowerCreate($request->REQUEST);
        $follower = $form->save();
        return new Pluf_HTTP_Response_Json($follower);
    }

    public static function find($request, $match)
    {
        $pag = new Pluf_Paginator(new Newspaper_Follower());
        $pag->list_filters = array(
            'type',
            'address'
        );
        $list_display = array(
            'type' => __('type'),
            'address' => __('address')
        );
        $search_fields = array(
            'address'
        );
        $sort_fields = array(
            'id',
            'type',
            'address'
        );
        $pag->configure($list_display, $search_fields, $sort_fields);
        $pag->items_per_page = Newspaper_Shortcuts_GetFollowerListCount($request);
        $pag->setFromRequest($request);
        return new Pluf_HTTP_Response_Json($pag->render_object());
    }

    /**
     * یک دستگاه را با شناسه تعیین می‌کند
     *
     * @param unknown $request            
     * @param unknown $match            
     * @return Pluf_HTTP_Response_Json
     */
    public static function get($request, $match)
    {
        // تعیین داده‌ها
        $follower = Newspaper_Shortcuts_GetFollowerOr404($match[1]);
        // اجرای درخواست
        return new Pluf_HTTP_Response_Json($follower);
    }

    /**
     * دستگاه را به روز می‌کند
     *
     * @param unknown $request            
     * @param unknown $match            
     */
    public static function update($request, $match)
    {
        // تعیین داده‌ها
        $follower = Newspaper_Shortcuts_GetFollowerOr404($match[1]);
        // اجرای درخواست
        $extra = array(
            // 'user' => $request->user,
            'follower' => $follower
        );
        // TODO: در اینجا از یک فرم استفاده شده برای به روزرسانی.
        // نمی‌دونم این فرم چیه باید درست بشه مثلا متد update که از این فرم
        // صدا زده شده رو مستقیما استفاده کنم
        $form = new Newspaper_Form_FollowerUpdate(array_merge($request->REQUEST, $request->FILES), $extra);
        $follower = $form->update();
        return new Pluf_HTTP_Response_Json($follower);
    }

    /**
     * دنبال‌کننده را حذف می‌کند.
     *
     * @param unknown $request            
     * @param unknown $match            
     * @return Pluf_HTTP_Response_Json
     */
    public static function delete($request, $match)
    {
        // تعیین داده‌ها
        $follower = Newspaper_Shortcuts_GetFollowerOr404($match[1]);
        // اجرا
        $follower2 = new Newspaper_Follower($follower->id);
        $follower2->delete();
        return new Pluf_HTTP_Response_Json($follower);
    }

}