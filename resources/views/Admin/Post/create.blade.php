@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="pl-10 p-10 text-lg text-center ">
                    CREATE POST
                </h1>
                <div class="p-6 text-gray-900 center">
                    <!-- FORM POST-->
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- TITLE -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Title
                            </label>
                            <input
                                type="text"
                                name="title"
                                placeholder="Title here"
                                required
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                        </div>

                        <!-- CONTENT -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Content
                            </label>
                            <textarea
                                name="content"
                                rows="6"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="Write your content..."
                            ></textarea>
                        </div>

                        <!-- IMAGE -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Image
                            </label>
                            <input
                                type="file"
                                name="image"
                                class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100"
                            >
                        </div>

                        <!-- BUTTON -->
                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-black font-medium px-6 py-2 rounded-lg shadow"
                            >
                                Criar post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection