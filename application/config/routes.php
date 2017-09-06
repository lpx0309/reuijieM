<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//自定义路由
$route['productType'] = 'Product/index';
$route['productType/(:num)'] = 'Product/Series/$1';
$route['productDetail/(:num)/(:num)'] = 'Product/Detail/$2';

$route['solution'] = 'Solution/index';
$route['solution/industry/(:num)/(:num)'] = 'Solution/More/$1/$2';
$route['solution/industry/(:num)/1/(:num)'] = 'Solution/Detail/$2';

$route['ruijie/case'] = 'Cases/index';
$route['ruijie/case/essList/(:num)'] = 'Cases/Recommond/$1';
$route['ruijie/case/list/(:num)/(:num)'] = 'Cases/Lists/$1/$2';
$route['ruijie/case/artile/(:num)'] = 'Cases/Artile/$1';

$route['service'] = 'Service/index';
$route['service/faq'] = 'Service/Faq';
$route['service/(:any)'] = 'Service/Map/$1';
$route['service/stopProduction'] = 'Service/StopProduct';
$route['service/(:num)/(:num)'] = 'Service/StopProductList/$1/$2';
$route['service/(:num)/1/(:num)'] = 'Service/StopProductDetail/$2';
$route['service/policy'] = 'Service/Policy';

$route['newcenter/(:num)/(:num)'] = 'News/index/$1/$2';
$route['newcenter/691/1/(:num)'] = 'News/Detail/$1';

$route['ruijie/videoCenter'] = 'Video/index';
$route['ruijie/video/list/vproduct/(:num)'] = 'Video/ProductList/$1';
$route['ruijie/video/list/vsolution/(:num)'] = 'Video/SolutionList/$1';
$route['ruijie/video/list/vcase/(:num)'] = 'Video/CaseList/$1';
$route['ruijie/video/play'] = 'Video/Play';

$route['about'] = 'About/index';
$route['contact'] = 'Contact/index';

//$route['ruijie/feedback/feedback.jsp'] = 'FeedBack/index';
$route['service/1/-1/38979'] = 'Service/StopProductDetail/38979';//产品生命周期策略

?>