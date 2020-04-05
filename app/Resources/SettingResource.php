<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\HtmlString;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'company' => $this->company,
            'address' => $this->address,
            'mobile' => $this->mobile,
            'phone' => $this->phone,
            'country' => $this->country,
            'zipcode' => $this->zipcode,
            'email' => $this->email,
            'android' => $this->android,
            'apple' => $this->apple,
            'youtube' => $this->youtube,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'whatsapp' => $this->whatsapp,
            'snapchat' => $this->snapchat,
            'logo' => $this->logoThumb,
            'app_logo' => $this->app_logo ? asset(env('LARGE').$this->app_logo) : $this->logoThumb,
            'longitude' => (float)$this->longitude,
            'latitude' => (float)$this->latitude,
            'gift_fee' => (float)$this->gift_fee,
            'description' => $this->description,
            'policy' => strip_tags($this->policy),
            'terms' => strip_tags($this->terms),
            'show_commercials' => $this->show_commercials,
            'splash_on' => $this->splash_on,
            'shipment_prices' => asset(env('LARGE') . $this->shipment_prices),
            'menu_bg' => asset(env('LARGE') . $this->menu_bg),
            'main_bg' => asset(env('MEDIUM') . $this->main_bg),
            'gift_image' => asset(env('MEDIUM') . $this->gift_image),
            'shipment_notes' => $this->shipment_notes,
            'cash_on_delivery' => $this->cash_on_delivery,
            'size_chart' => asset(env('LARGE') . $this->size_chart),
            'colors' => [
                'main_theme_color' => $this->main_theme_color,
                'main_theme_bg_color' => $this->main_theme_bg_color,
                'header_one_theme_color' => $this->header_one_theme_color,
                'header_tow_theme_color' => $this->header_tow_theme_color,
                'header_three_theme_color' => $this->header_three_theme_color,
                'header_one_theme_bg' => $this->header_one_theme_bg,
                'header_tow_theme_bg' => $this->header_tow_theme_bg,
                'header_three_theme_bg' => $this->header_three_theme_bg,
                'normal_text_theme_color' => $this->normal_text_theme_color,
                'btn_text_theme_color' => $this->btn_text_theme_color,
                'btn_text_hover_theme_color' => $this->btn_text_hover_theme_color,
                'btn_bg_theme_color' => $this->btn_bg_theme_color,
                'header_theme_color' => $this->header_theme_color,
                'header_theme_bg' => $this->header_theme_bg,
                'footer_theme_color' => $this->footer_theme_color,
                'footer_bg_theme_color' => $this->footer_bg_theme_color,
                'icon_theme_color' => $this->icon_theme_color,
                'icon_theme_bg' => $this->icon_theme_bg,
                'menu_theme_color' => $this->menu_theme_color,
                'menu_theme_bg' => $this->menu_theme_bg,
            ],
            'images' => ImageLightResource::collection($this->whenLoaded('images')),
        ];
    }
}
