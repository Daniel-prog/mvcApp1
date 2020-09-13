<form method="post" class="form-horizontal" data-ng-show="isShowEditForm">
    <input type="hidden" data-ng-model="userId">

    <fieldset>
        <div class="form-group">
            <label for="fullName" class="col-md-4 control-label">ФИО</label>
            <div class="col-md-4">
                <input type="text" id="fullName" name="fullName" data-ng-model="userFullName" class="form-control" required="true">
            </div>
        </div>
        <div class="form-group">
            <label for="login" class="col-md-4 control-label">Логин</label>
            <div class="col-md-4">
                <input type="text" id="login" name="login" data-ng-model="userLogin" class="form-control" required="true">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-4 control-label">Email</label>
            <div class="col-md-4">
                <input type="email" id="email" name="email" data-ng-model="userEmail" class="form-control" required="true">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="role">Роль</label>
            <div class="col-md-4">
                <select name="role" id="role" class="form-control" ng-options="option.name for option in roles track by option.id" ng-model="userSelRole"></select>
            </div>
        </div>

        <div class="from-group">
            <div class="col-md-4 col-md-offset-4">
                <button class="btn btn-success">Сохранить</button>
                <button class="btn btn-danger">Удалить</button>
            </div>
        </div>
    </fieldset>
</form>