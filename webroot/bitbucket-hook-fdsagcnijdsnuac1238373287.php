<?php
$repo_dir = '/var/www/transparencia.org.br/transparencia.org.br.git';
$web_root_dir = '/var/www/transparencia.org.br/public';

// Full path to git binary is required if git is not in your PHP user's path. Otherwise just use 'git'.
$git_bin_path = 'git';

$update = false;
$branch = "";

// Parse data from Bitbucket hook payload
$payload = json_decode($_POST['payload']);

if (empty($payload->commits)){
  echo "entrou $payload->commits<br>";
  // When merging and pushing to bitbucket, the commits array will be empty.
  // In this case there is no way to know what branch was pushed to, so we will do an update.
  $update = true;
} else {
  echo "ELSE $payload->commits<br>";
  foreach ($payload->commits as $commit) {
    echo "foreach<br>";
    $branch = $commit->branch;
    if ($branch === 'stage' || isset($commit->branches) && in_array('stage', $commit->branches)) {
      echo "$branch === 'stage' || isset($commit->branches) && in_array('stage', $commit->branches)<br>";
      $update =	true;
      break;
    }
  }
}

if ($update) {
  echo "update<br>";
  // Do a git checkout to the web root
  exec('cd ' . $repo_dir . ' && ' . $git_bin_path  . ' fetch');
  exec('cd ' . $repo_dir . ' && GIT_WORK_TREE=' . $web_root_dir . ' ' . $git_bin_path  . ' checkout -f');

  echo ('cd ' . $repo_dir . ' && ' . $git_bin_path  . ' fetch');
  echo ('cd ' . $repo_dir . ' && GIT_WORK_TREE=' . $web_root_dir . ' ' . $git_bin_path  . ' checkout -f');

  // Log the deployment
  $commit_hash = shell_exec('cd ' . $repo_dir . ' && ' . $git_bin_path  . ' rev-parse --short HEAD');
  echo "commit_hash<br>";
  echo $commit_hash . " " . FILE_APPEND;
  file_put_contents('deploy.log', date('m/d/Y h:i:s a') . " Deployed branch: " .  $branch . " Commit: " . $commit_hash . "\n", FILE_APPEND);
}
?>