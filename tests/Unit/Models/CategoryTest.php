<?php

namespace Tests\Unit\Models;

use App\User;
use App\Category;
use App\Transaction;
use Tests\TestCase as TestCase;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_category_has_belongs_to_creator_relation()
    {
        $category = factory(Category::class)->make();

        $this->assertInstanceOf(User::class, $category->creator);
        $this->assertEquals($category->creator_id, $category->creator->id);
    }

    /** @test */
    public function a_category_has_for_user_scope()
    {
        $categoryOwner = $this->createUser();
        $category = factory(Category::class)->create([
            'creator_id' => $categoryOwner->id,
        ]);
        $othersCategory = factory(Category::class)->create();

        $this->assertCount(1, Category::forUser($categoryOwner)->get());
    }

    /** @test */
    public function a_category_has_many_transactions_relation()
    {
        $category = factory(Category::class)->create();
        $transaction = factory(Transaction::class)->create(['category_id' => $category->id]);

        $this->assertInstanceOf(Collection::class, $category->transactions);
        $this->assertInstanceOf(Transaction::class, $category->transactions->first());
    }
}