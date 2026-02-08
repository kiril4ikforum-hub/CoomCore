<?php
/**
 * COOMCORE - Custom Bedrock Edition Server Core
 * Modified PocketMine.php for MCPEhost compatibility
 */
declare(strict_types=1);
namespace pocketmine;

echo "\n";
echo "  ██████╗ ██████╗ ██████╗ ███╗   ███╗\n";
echo " ██╔════╝██╔═══██╗██╔══██╗████╗ ████║\n";
echo " ██║     ██║   ██║██████╔╝██╔████╔██║\n";
echo " ██║     ██║   ██║██╔══██╗██║╚██╔╝██║\n";
echo " ╚██████╗╚██████╔╝██║  ██║██║ ╚═╝ ██║\n";
echo "  ╚═════╝ ╚═════╝ ╚═╝  ╚═╝╚═╝     ╚═╝\n";
echo "     Custom Bedrock Core v1.0.0\n";
echo "     Protocol: 1.20.x - 1.21.132\n";
echo "==========================================\n\n";

if(version_compare(PHP_VERSION, '8.2.0', '<')){
    die("[COOMCORE] PHP 8.2+ required. Current: " . PHP_VERSION . "\n");
}

$vendorPath = dirname(__DIR__) . '/vendor/autoload.php';
if(!file_exists($vendorPath)){
    echo "[COOMCORE] ERROR: vendor/autoload.php not found!\n";
    exit(1);
}
require_once $vendorPath;

$coomcoreBootstrap = __DIR__ . '/CoomCore/Core/Bootstrap.php';
if(!file_exists($coomcoreBootstrap)){
    die("[COOMCORE] ERROR: CoomCore bootstrap not found!\n");
}

echo "[COOMCORE] Loading CoomCore kernel...\n";
require_once $coomcoreBootstrap;

try {
    \CoomCore\Core\Bootstrap::main();
} catch(\Throwable $e) {
    echo "[COOMCORE] FATAL ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    exit(1);
}