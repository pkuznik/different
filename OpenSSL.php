<?php

/**
 * Description of OpenSSL
 *
 * Easy support OpenSSL
 * 
 * @version 0.1
 * @author Piotr Kuźnik <piotr.damian.kuznik@gmail.com>
 * @license GPL
 */
class OpenSSL {
    
    /**
     *
     * @var string
     */
    private $config = [];
    
    /**
     *
     * @var string
     */
    private $res = null;

    /**
     *
     * @var string
     */
    private $publicKey;
    
    /**
     *
     * @var string
     */
    private $privateKey;
    
    /**
     * 
     * @param array $config <p>You can finetune the key generation 
     * (such as specifying the number of bits) using configargs. 
     * See openssl_csr_new() for more information about configargs. </p>
     */
    public function __construct( $config = null ) {
        if (is_null($config)){
            $config = [ 
                //"config" => "C:/xampp/apache/conf/openssl.cnf",
                "digest_alg" => "sha512",
                "private_key_bits" => 1024,
                "private_key_type" => OPENSSL_KEYTYPE_RSA,
            ];
        }
        
        $this->config = $config;
    }
    
    public function generateNewKey( ) {
        $this->res = openssl_pkey_new($this->config);
    }
    
    /**
     * 
     * @return string
     */
    public function getPrivateKey( ) {
        $privKey = '';
        openssl_pkey_export($this->res, $privKey, null, $this->config);
        return $privKey;
    }
    
    /**
     * 
     * @return string
     */
    public function getPublicKey( ) {
        $pubKey = openssl_pkey_get_details($this->res);
        return $pubKey["key"];
    }
    
    public function commit(){
        $this->privateKey = $this->getPrivateKey();
        $this->publicKey = $this->getPublicKey();
    }
    
    /**
     * 
     * @param string $key
     */
    public function setKeyPublic( $key ) {
        $this->publicKey = $key;
    }
    
    /**
     * 
     * @param string $key
     */
    public function setKeyPrivate( $key ) {
        $this->privateKey = $key;
    }
    
    /**
     * 
     * @param string $data
     * @return string|null
     */
    public function encrypt( $data ) {
        if (is_string($this->publicKey) == false ) {
            return null;
        }
        $encrypted = '';
        openssl_public_encrypt($data, $encrypted, $this->publicKey);
        return $encrypted;
    }
    
    /**
     * 
     * @param string $encrypted
     * @return string|null
     */
    public function decrypt( $encrypted ){
        if (is_string($this->privateKey) == false ) {
            return null;
        }
        $decrypted = '';
        openssl_private_decrypt($encrypted, $decrypted, $this->privateKey);
        return $decrypted;
    }
}
