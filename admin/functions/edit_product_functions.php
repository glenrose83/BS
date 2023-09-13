<?php

function change_category($clean_category, $sanitized_id, $pdo){
        $data=[
            'id' => $sanitized_id,
            'category' => $clean_category
    ];

    $sql = "UPDATE products SET category=:category WHERE id=:id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);

    }