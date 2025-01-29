<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\Product;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function __construct(Request $request)
    {
        if ($request->method() == 'GET') {
            $lang = App::getLocale();
            view()->share('lang', $lang);

            $setting = Setting::first();
            view()->share('setting', $setting);

            $categories = Category::with('children')->where('status', 1)->whereNull('parent_id')->get();
            view()->share('categories', $categories);
        }
    }

    public function home()
    {
        $banners = Banner::where('type', Banner::TYPE_HOME)->orderBy('sort', 'asc')->get();
        $categories = Category::orderBy('sort', 'asc')->limit(7)->get();
        $topProducts = Product::orderBy('created_at', 'desc')->where('top', 1)->limit(13)->get();
        $stocks = Post::where('type', Post::TYPE_STOCK)->get();
        $reviews = Review::orderBy('sort', 'asc')->get();
        $news = Post::where('type', Post::TYPE_POST)->orderBy('published_at', 'desc')->limit(4)->get();
        $faqs = Faq::all();

        return view('frontend.pages.index', compact(
            'banners',
            'categories',
            'topProducts',
            'stocks',
            'reviews',
            'news',
            'faqs'
        ));
    }

    public function catalog(Request $request, $slug = null)
    {
        $banners = Banner::where('type', Banner::TYPE_CATALOG)->orderBy('sort', 'asc')->get();

        $query = $request->get('query');
        $category = null;

        if(!empty($slug)) {
            $category = Category::where('slug', $slug)->first();
        }

        $products = Product::orderBy('created_at', 'desc')
            ->when($query, function ($q) use ($query) {
                $q->whereHas('translate', function ($translate) use ($query) {
                    $translate->where('name', 'ilike', '%' . $query . '%');
                });
            })
            ->when($category instanceof Category, function ($q) use ($category) {
                $q->where('category_id', $category->id);
            })
            ->where('status', 1)
            ->paginate(8);

        return view('frontend.pages.catalog', compact('banners', 'category', 'products'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.product', compact('product'));
    }

    public function about()
    {
        $team = Team::orderBY('sort', 'asc')->get();
        return view('frontend.pages.about', compact('team'));
    }

    public function news()
    {
        $news = Post::where('type', Post::TYPE_POST)->paginate(8);
        return view('frontend.pages.news', compact('news'));
    }

    public function new($slug)
    {
        $new = Post::where('slug', $slug)->firstOrFail();
        $otherNews = Post::where('type', Post::TYPE_POST)->where('id', '!=', $new->id)->limit(8)->get();
        return view('frontend.pages.new', compact('new', 'otherNews'));
    }

    public function contacts() {
        return view('frontend.pages.contacts');
    }

    public function feedback(Request $request)
    {
        if ($request->ajax()) {
            $request->validate(Feedback::rules());

            Feedback::create([
                'phone' => $request->phone,
                'name' => $request->get('name') . ' ' . $request->get('surname'),
                'type' => $request->get('type')
            ]);
            return response()->json('success');
        }
        abort(404);
        return '';
    }

    public function getBasketItems(Request $request)
    {
        $data = $request->get('data') ?? [];
        $products_sum = 0;

        $products = [];
        foreach ($data as $item) {
            if (!empty($item['id'])) {
                $product = Product::where('id', $item['id'])->first();
                $product->cart_quantity = $item['quantity'];
                $products[] = $product;

                $products_sum+=($product->cart_quantity*$product->amount);
            }
        }
        $view = view('frontend.components.basket-items', compact('products'))->render();

        return response()->json([
            'products_view' => $view,
            'products_count' => count($products),
            'products_sum' => number_format(round($products_sum), 0,',',' ')
        ]);
    }
}
