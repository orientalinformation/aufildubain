<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\Page;
use App\Models\Store;
use App\Models\Trend;
use App\Models\Solution;

class Sitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate public/sitemap.xml';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Select models
        $products = Product::where('visible', 1)->get();
        $categories = ProductCategory::all();
        $brands = Brand::all();
        $pages = Page::where('status', 'ACTIVE')->get();
        $stores = Store::all();
        $trends = Trend::all();
        $solutions = Solution::all();

        // write xml file
        $sitemap = fopen('public/sitemap.xml', 'w');
        $siteurl = getenv('APP_URL');
        fputs($sitemap, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
        fputs($sitemap, "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n");

        fputs($sitemap, "<url>\n");
        fputs($sitemap, "<loc>$siteurl</loc>\n");
        fputs($sitemap, "<changefreq>monthly</changefreq>\n");
        fputs($sitemap, "<priority>1.0</priority>\n");
        fputs($sitemap, "</url>\n");

        foreach ($pages as $page) {
            if ($page->slug == 'index') continue;
            fputs($sitemap, "<url>\n");
            fputs($sitemap, "<loc>$siteurl/{$page->slug}.html</loc>\n");
            fputs($sitemap, "<changefreq>monthly</changefreq>\n");
            fputs($sitemap, "<priority>1.0</priority>\n");
            fputs($sitemap, "</url>\n");
        }

        foreach ($brands as $brand) {
            fputs($sitemap, "<url>\n");
            fputs($sitemap, "<loc>$siteurl/marques/{$brand->slug}.html</loc>\n");
            fputs($sitemap, "<changefreq>monthly</changefreq>\n");
            fputs($sitemap, "<priority>1.0</priority>\n");
            fputs($sitemap, "</url>\n");
        }

        foreach ($stores as $store) {
            fputs($sitemap, "<url>\n");
            fputs($sitemap, "<loc>$siteurl/salle-de-bain-{$store->slug}.html</loc>\n");
            fputs($sitemap, "<changefreq>monthly</changefreq>\n");
            fputs($sitemap, "<priority>1.0</priority>\n");
            fputs($sitemap, "</url>\n");
        }

        foreach ($trends as $trend) {
            fputs($sitemap, "<url>\n");
            fputs($sitemap, "<loc>$siteurl/tendances-moment/{$trend->slug}.html</loc>\n");
            fputs($sitemap, "<changefreq>monthly</changefreq>\n");
            fputs($sitemap, "<priority>1.0</priority>\n");
            fputs($sitemap, "</url>\n");
        }

        foreach ($solutions as $solution) {
            fputs($sitemap, "<url>\n");
            fputs($sitemap, "<loc>$siteurl/salle-de-bains/{$solution->slug}.html</loc>\n");
            fputs($sitemap, "<changefreq>monthly</changefreq>\n");
            fputs($sitemap, "<priority>1.0</priority>\n");
            fputs($sitemap, "</url>\n");
        }

        foreach ($categories as $category) {
            fputs($sitemap, "<url>\n");
            $categorySlug = '';
            if (!$category->parent_id || $category->parent_id == 0) {
                fputs($sitemap, "<loc>$siteurl/produits/{$category->slug}.html</loc>\n");
                fputs($sitemap, "<changefreq>monthly</changefreq>\n");
                fputs($sitemap, "<priority>1.0</priority>\n");
                $categorySlug = "{$category->slug}";
            } else {
                $parentCategory = ProductCategory::where('id', $category->parent_id)->first();
                fputs($sitemap, "<loc>$siteurl/produits/{$parentCategory->slug}/{$category->slug}.html</loc>\n");
                fputs($sitemap, "<changefreq>monthly</changefreq>\n");
                fputs($sitemap, "<priority>1.0</priority>\n");
                $categorySlug = "{$parentCategory->slug}/{$category->slug}";
            }
            fputs($sitemap, "</url>\n");
            $products = Product::where('category_id', $category->id)->get();

            foreach ($products as $product) {
                fputs($sitemap, "<url>\n");
                fputs($sitemap, "<loc>$siteurl/produits/$categorySlug/{$product->slug}.html</loc>\n");
                fputs($sitemap, "<changefreq>monthly</changefreq>\n");
                fputs($sitemap, "<priority>1.0</priority>\n");
                fputs($sitemap, "</url>\n");
            }
        }

        fputs($sitemap, '</urlset>');

        fclose($sitemap);
    }
}
