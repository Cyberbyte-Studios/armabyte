<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> {{ shell_exec("git log -1 --pretty=format:'%h - %s' --abbrev-commit `git merge-base local-dev dev`") }}
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>