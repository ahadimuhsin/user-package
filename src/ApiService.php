<?php
namespace Services;

use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class ApiService
{
    protected string $endpoint;

    public function request(string $method, string $path, $data = [])
    {
        $response = $this->getRequest($method, $path, $data);

        if ($response->ok()){
            return $response->json();
        }

        throw new HttpException($response->status(), $response->body());
    }

    public function getRequest(string $method, string $path, $data = [])
    {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . request()->cookie('jwt')
        ])->$method("{$this->endpoint}/{$path}", $data);
    }

    public function post(string $path, array $data)
    {
        return $this->request('post', $path, $data);
    }

    public function get(string $path)
    {
        return $this->request('get', $path);
    }

    public function put(string $path, array $data)
    {
        return $this->request('put', $path, $data);
    }

    public function delete(string $path)
    {
        return $this->request('delete', $path);
    }
}