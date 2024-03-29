<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Advert
 *
 * @property int $id
 * @property int|null $active
 * @property string|null $link_title
 * @property string|null $banner
 * @property string|null $banner_alt
 * @property string|null $url
 * @property int $user_id
 * @property int|null $advertable_id
 * @property string|null $advertable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $advertable
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert query()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereAdvertableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereAdvertableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereBannerAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereLinkTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Advert whereUserId($value)
 */
	class Advert extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Album
 *
 * @property int $id
 * @property int $active
 * @property string $cover_image
 * @property string $alt
 * @property string $title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $slug
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\unused\AlbumPhoto> $photos
 * @property-read int|null $photos_count
 * @method static \Database\Factories\AlbumFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album query()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Album whereUpdatedAt($value)
 */
	class Album extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AlbumPhoto
 *
 * @property int $id
 * @property int $active
 * @property int $album_id
 * @property string $file
 * @property string $alt
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\unused\Album|null $album
 * @method static \Database\Factories\AlbumPhotoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|unused\AlbumPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\AlbumPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\AlbumPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\AlbumPhoto whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\AlbumPhoto whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\AlbumPhoto whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\AlbumPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\AlbumPhoto whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\AlbumPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|unused\AlbumPhoto whereUpdatedAt($value)
 */
	class AlbumPhoto extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $comment
 * @property int|null $user_id
 * @property int $commentable_id
 * @property string $commentable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @property-read \App\Models\Translations\CommentTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\CommentTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Comment listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment withTranslation()
 */
	class Comment extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Company
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $company_type
 * @property string $delivery
 * @property string|null $header
 * @property string|null $logo
 * @property string|null $image1
 * @property string|null $image2
 * @property string|null $image3
 * @property string $days
 * @property string $morningtime
 * @property string $afternoontime
 * @property string|null $telephone
 * @property string|null $website
 * @property string|null $email
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string $pos
 * @property string|null $creditcard
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\unused\Advert> $adverts
 * @property-read int|null $adverts_count
 * @property-read \App\Models\CompanyType|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Like> $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\Translations\CompanyTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\CompanyTranslation> $translations
 * @property-read int|null $translations_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Company active()
 * @method static \Database\Factories\CompanyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Company listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Company orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Company orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Company orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Company translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAfternoontime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCompanyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreditcard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereMorningtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withTranslation()
 */
	class Company extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\CompanyType
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Translations\CompanyTypeTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\CompanyTypeTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType translated()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyType withTranslation()
 */
	class CompanyType extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $city
 * @property string|null $province
 * @property string|null $address
 * @property string|null $postalcode
 * @property string|null $phone
 * @property string|null $facebookid
 * @property string|null $twitterid
 * @property string|null $otherinfo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Like> $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFacebookid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereOtherinfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePostalcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereTwitterid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Event
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $header
 * @property string|null $logo
 * @property string|null $image1
 * @property string|null $image2
 * @property string|null $image3
 * @property string $start_date
 * @property string $start_time
 * @property string $end_date
 * @property string $end_time
 * @property string $entrance
 * @property string $telephone
 * @property string|null $website
 * @property string|null $email
 * @property string|null $facebook
 * @property string|null $twitter
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\unused\Advert> $adverts
 * @property-read int|null $adverts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\Group|null $group
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Like> $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\Translations\EventTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\EventTranslation> $translations
 * @property-read int|null $translations_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Event active()
 * @method static \Database\Factories\EventFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Event listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Event translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEntrance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event withTranslation()
 */
	class Event extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Group
 *
 * @property int $id
 * @property int $user_id
 * @property int $group_type
 * @property string|null $header
 * @property string|null $logo
 * @property string|null $image1
 * @property string|null $image2
 * @property string|null $image3
 * @property string|null $telephone
 * @property string|null $website
 * @property string|null $email
 * @property string|null $facebook
 * @property string|null $twitter
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\unused\Advert> $adverts
 * @property-read int|null $adverts_count
 * @property-read \App\Models\GroupType|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\Event|null $event
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Like> $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\Translations\GroupTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\GroupTranslation> $translations
 * @property-read int|null $translations_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Group active()
 * @method static \Database\Factories\GroupFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Group listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Group orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Group orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Group orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Group translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGroupType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group withTranslation()
 */
	class Group extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\GroupType
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Group> $venues
 * @property-read int|null $groups_count
 * @property-read \App\Models\Translations\GroupTypeTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\GroupTypeTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType translated()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType withTranslation()
 */
	class GroupType extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Like
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int $likeable_id
 * @property string $likeable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $likeable
 * @method static \Illuminate\Database\Eloquent\Builder|Like newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Like newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Like query()
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereLikeableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereLikeableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereUpdatedAt($value)
 */
	class Like extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Newsletter
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereUpdatedAt($value)
 */
	class Newsletter extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $billing_email
 * @property string|null $billing_name
 * @property string|null $billing_address
 * @property string|null $billing_city
 * @property string|null $billing_province
 * @property string|null $billing_postalcode
 * @property string|null $billing_phone
 * @property float|null $billing_subtotal
 * @property int|null $billing_tax
 * @property float|null $billing_total
 * @property string|null $billing_other_info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer|null $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingOtherInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingPostalcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderProduct
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereUpdatedAt($value)
 */
	class OrderProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Photo
 *
 * @property-read \App\Models\unused\Album|null $album
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|unused\Photo query()
 */
	class Photo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $post_type
 * @property int|null $active
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PostType|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Like> $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\Translations\PostTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\PostTranslation> $translations
 * @property-read int|null $translations_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Post active()
 * @method static \Database\Factories\PostFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Post listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Post translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post withTranslation()
 */
	class Post extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\PostType
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-read \App\Models\Translations\PostTypeTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\PostTypeTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|PostType listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostType notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|PostType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostType translated()
 * @method static \Illuminate\Database\Eloquent\Builder|PostType translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType withTranslation()
 */
	class PostType extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property int|null $company_id
 * @property int|null $product_type
 * @property int $user_id
 * @property string|null $header
 * @property string|null $logo
 * @property string|null $image1
 * @property string|null $image2
 * @property string|null $image3
 * @property string $sku
 * @property float $price
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductType|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Like> $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\Translations\ProductTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\ProductTranslation> $translations
 * @property-read int|null $translations_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Product active()
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Product translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withTranslation()
 */
	class Product extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\ProductType
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\Translations\ProductTypeTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\ProductTypeTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType translated()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType withTranslation()
 */
	class ProductType extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subscriber
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereUpdatedAt($value)
 */
	class Subscriber extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $active
 * @property string|null $fullname
 * @property string $username
 * @property string|null $tel
 * @property string|null $mobile
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $facebookid
 * @property string|null $twitterid
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Event> $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Group> $venues
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFacebookid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwitterid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\CommentTranslation
 *
 * @property int $id
 * @property string|null $comment
 * @property int $comment_id
 * @property string $locale
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CommentTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CommentTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CommentTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CommentTranslation whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CommentTranslation whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CommentTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CommentTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CommentTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CommentTranslation whereUpdatedAt($value)
 */
	class CommentTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\CompanyTranslation
 *
 * @property int $id
 * @property int $company_id
 * @property string $locale
 * @property string $title
 * @property string $slug
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $manager
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTranslation withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class CompanyTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\CompanyTypeTranslation
 *
 * @property int $id
 * @property int $company_type_id
 * @property string $locale
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation whereCompanyTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CompanyTypeTranslation withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class CompanyTypeTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\EventTranslation
 *
 * @property int $id
 * @property int $event_id
 * @property string $locale
 * @property string $title
 * @property string $slug
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\EventTranslation withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class EventTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\GroupTranslation
 *
 * @property int $id
 * @property int $group_id
 * @property string $locale
 * @property string $title
 * @property string $slug
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $manager
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTranslation withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class GroupTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\GroupTypeTranslation
 *
 * @property int $id
 * @property int $group_type_id
 * @property string $locale
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation whereGroupTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\GroupTypeTranslation withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class GroupTypeTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\PostTranslation
 *
 * @property int $id
 * @property int $post_id
 * @property string $locale
 * @property string $title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $slug
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTranslation withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class PostTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\PostTypeTranslation
 *
 * @property int $id
 * @property int $post_type_id
 * @property string $locale
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation wherePostTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\PostTypeTranslation withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class PostTypeTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\ProductTranslation
 *
 * @property int $id
 * @property int $product_id
 * @property string $locale
 * @property string $title
 * @property string $slug
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTranslation withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class ProductTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\ProductTypeTranslation
 *
 * @property int $id
 * @property int $product_type_id
 * @property string $locale
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation whereProductTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\ProductTypeTranslation withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class ProductTypeTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\SubscriberTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\SubscriberTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\SubscriberTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\SubscriberTranslation query()
 */
	class SubscriberTranslation extends \Eloquent {}
}

